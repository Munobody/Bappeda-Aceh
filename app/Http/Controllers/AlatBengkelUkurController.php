<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlatBengkelUkurController extends Controller
{
    public function index()
    {
        $csvPath = storage_path('app/public/Alat-Bengkel-_-Alat-Ukur.csv');

        if (!file_exists($csvPath)) {
            abort(404, "CSV file not found at $csvPath");
        }

        $data = array_map('str_getcsv', file($csvPath));
        $headers = array_map('strtolower', $data[0]);
        $rows = array_slice($data, 1);

        $processedData = $this->processAlatData($rows, $headers);
        $distributionData = $this->processDistributionData($rows, $headers);
        $dateDistributionData = $this->processDateDistributionData($rows, $headers);

        return view('alatbengkelukur', compact('processedData', 'distributionData', 'dateDistributionData'));
    }

    private function processAlatData($rows, $headers)
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

            // Log the $item array to verify the keys
            \Log::info('Processed Item: ' . print_r($item, true));

            if (!isset($item['merek/tipe'])) {
                \Log::warning("'merek/tipe' key not found in row: " . implode(',', $row));
                continue;
            }

            $key = $item['merek/tipe'];

            if (!isset($data[$key])) {
                $data[$key] = [
                    'merek_tipe' => $key,
                    'count' => 0,
                    'details' => []
                ];
            }

            $data[$key]['count']++;
            $data[$key]['details'][] = [
                'Nama Barang' => $item['nama_barang'] ?? '-',
                'Tanggal Perolehan' => $item['tanggal perolehan'] ?? '-'
            ];
        }

        return $data; // Make sure to return the processed data
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

    private function processDateDistributionData($rows, $headers)
    {
        $dateDistribution = [];

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
}
