<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlatLainnyaController extends Controller
{
    public function index()
    {
        $csvPath = storage_path('app/public/Alat-Lainnya.csv');

        if (!file_exists($csvPath)) {
            abort(404, "CSV file not found at $csvPath");
        }

        $data = array_map('str_getcsv', file($csvPath));
        $headers = array_map('strtolower', $data[0]);
        $rows = array_slice($data, 1);

        $processedData = $this->processKomputerData($rows, $headers);
        $distributionData = $this->processDistributionData($rows, $headers);
        $subCategoryData = $this->processSubCategoryData($rows, $headers);
        $dateDistributionData = $this->processDateDistributionData($rows, $headers);
        $categoryData = $this->processCategoryData($rows, $headers); // Updated
        $alatData = $this->processAlatData($rows, $headers); // Updated

        return view('alatlainnya', compact('processedData', 'distributionData', 'subCategoryData', 'dateDistributionData', 'categoryData', 'alatData'));
    }

    private function processKomputerData($rows, $headers)
    {
        $data = [];

        foreach ($rows as $row) {
            if (count($headers) !== count($row)) {
                \Log::warning("Row does not match header count. Row: " . implode(',', $row));
                continue;
            }

            $item = array_combine($headers, $row);

            if ($item === false) {
                \Log::warning("array_combine failed for row: " . implode(',', $row));
                continue;
            }

            if (!isset($item['nama_barang'])) {
                \Log::warning("'nama_barang' key not found in row: " . implode(',', $row));
                continue;
            }

            $key = $item['nama_barang'];

            if (!isset($data[$key])) {
                $data[$key] = [
                    'nama_barang' => $key,
                    'count' => 0,
                    'details' => []
                ];
            }

            $data[$key]['count']++;
            $data[$key]['details'][] = [
                'Merek/tipe' => $item['merek/tipe'] ?? '-',
                'Tanggal Perolehan' => $item['tanggal perolehan'] ?? '-'
            ];
        }
        return $data;
    }

    private function processDistributionData($rows, $headers)
    {
        $distribution = [];

        foreach ($rows as $row) {
            if (count($headers) !== count($row)) {
                continue;
            }

            $item = array_combine($headers, $row);

            if ($item === false || !isset($item['tanggal perolehan'])) {
                continue;
            }

            $date = $item['tanggal perolehan'];
            $year = date('Y', strtotime($date));

            if (!isset($distribution[$year])) {
                $distribution[$year] = 0;
            }

            $distribution[$year]++;
        }

        ksort($distribution);
        return $distribution;
    }

    private function processSubCategoryData($rows, $headers)
    {
        $subCategories = [];

        foreach ($rows as $row) {
            if (count($headers) !== count($row)) {
                continue;
            }

            $item = array_combine($headers, $row);

            if ($item === false || !isset($item['sub kategori'])) {
                continue;
            }

            $subCategory = $item['sub kategori'];

            if (!isset($subCategories[$subCategory])) {
                $subCategories[$subCategory] = 0;
            }

            $subCategories[$subCategory]++;
        }

        arsort($subCategories);
        return $subCategories;
    }

    private function processDateDistributionData($rows, $headers)
    {
        $dateDistribution = [];
        $formattedDates = [];

        foreach ($rows as $row) {
            if (count($headers) !== count($row)) {
                continue;
            }

            $item = array_combine($headers, $row);

            if ($item === false || !isset($item['tanggal perolehan'])) {
                continue;
            }

            $date = $item['tanggal perolehan'];
            $formattedDate = date('Y-m', strtotime($date));

            if (!isset($dateDistribution[$formattedDate])) {
                $dateDistribution[$formattedDate] = 0;
            }

            $dateDistribution[$formattedDate]++;
        }

        ksort($dateDistribution);

        return $dateDistribution;
    }

    private function processCategoryData($rows, $headers) // Updated
    {
        $categories = [];

        foreach ($rows as $row) {
            if (count($headers) !== count($row)) {
                continue;
            }

            $item = array_combine($headers, $row);

            if ($item === false || !isset($item['kategori'])) {
                continue;
            }

            $category = $item['kategori'];

            if (!isset($categories[$category])) {
                $categories[$category] = 0;
            }

            $categories[$category]++;
        }

        arsort($categories);
        return $categories;
    }

    private function processAlatData($rows, $headers) // Updated
    {
        $alat = [];

        foreach ($rows as $row) {
            if (count($headers) !== count($row)) {
                continue;
            }

            $item = array_combine($headers, $row);

            if ($item === false || !isset($item['alat'])) {
                continue;
            }

            $alatName = $item['alat'];

            if (!isset($alat[$alatName])) {
                $alat[$alatName] = 0;
            }

            $alat[$alatName]++;
        }

        arsort($alat);
        return $alat;
    }
}
