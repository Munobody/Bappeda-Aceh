<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KantorController extends Controller
{
    public function index()
    {
        // Path to your CSV file
        $csvPath = storage_path('app/public/Alat-Kantor-_-Rumah-Tangga.csv');

        // Check if the file exists
        if (!file_exists($csvPath)) {
            abort(404, "CSV file not found at $csvPath");
        }

        // Open the CSV file and read data
        $data = array_map('str_getcsv', file($csvPath));
        $headers = array_map('strtolower', $data[0]); // Ensure headers are lowercase
        $rows = array_slice($data, 1);

        // Process data into a suitable format for the view
        $processedData = $this->processKantorData($rows, $headers);

        return view('kantor', compact('processedData'));
    }

    private function processKantorData($rows, $headers)
    {
        $data = [];

        foreach ($rows as $row) {
            if (count($headers) !== count($row)) {
                \Log::warning("Row does not match header count. Row: " . implode(',', $row));
                continue; // Skip this row
            }

            $item = array_combine($headers, $row);

            if ($item === false) {
                \Log::warning("array_combine failed for row: " . implode(',', $row));
                continue; // Skip this row
            }

            if (!isset($item['kategori'])) {
                \Log::warning("'kategori' key not found in row: " . implode(',', $row));
                continue; // Skip this row
            }

            $key = $item['kategori'];

            if (!isset($data[$key])) {
                $data[$key] = [
                    'kategori' => $key,
                    'count' => 0,
                    'details' => [] // Ensure 'details' is always an array
                ];
            }

            $data[$key]['count']++;
            $data[$key]['details'][] = [
                'Sub Kategori' => $item['sub kategori'] ?? '-',
                'Nama Barang' => $item['nama barang'] ?? '-',
                'Merek/Tipe' => $item['merek/tipe'] ?? '-'
            ];
        }
        return $data;
    }
}
