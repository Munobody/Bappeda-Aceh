<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Path to your CSV file
        $csvPath = storage_path('app/public/Alat-Angkutan.csv');

        // Check if the file exists
        if (!file_exists($csvPath)) {
            abort(404, "CSV file not found at $csvPath");
        }

        // Open the CSV file and read data
        $data = array_map('str_getcsv', file($csvPath));
        $headers = array_map('strtolower', array_map('trim', $data[0])); // Ensure headers are lowercase and trimmed
        $rows = array_slice($data, 1);

        // Process data into a suitable format for Chart.js
        $processedData = $this->processData($rows, $headers);

        return view('dashboard', compact('processedData'));
    }

    private function processData($rows, $headers)
    {
        $data = [];

        foreach ($rows as $row) {
            if (count($headers) !== count($row)) {
                \Log::warning("Row does not match header count. Row: " . implode(',', $row));
                continue; // Skip this row
            }

            $item = array_combine($headers, array_map('trim', $row)); // Combine headers and row values, trimming whitespace

            if ($item === false) {
                \Log::warning("array_combine failed for row: " . implode(',', $row));
                continue; // Skip this row
            }

            if (!isset($item['kategori']) || !isset($item['merek']) || !isset($item['tipe']) || !isset($item['subkategori']) || !isset($item['namabarang'])) {
                \Log::warning("'kategori', 'merek', 'tipe', 'subkategori', or 'namabarang' key not found in row: " . implode(',', $row));
                continue; // Skip this row
            }

            $data[] = [
                'kategori' => $item['kategori'],
                'merek' => $item['merek'],
                'tipe' => $item['tipe'],
                'subkategori' => $item['subkategori'],
                'namabarang' => $item['namabarang'],
            ];
        }

        return $data;
    }
}