<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Path to your CSV file
        $csvPath = storage_path('app/public/Transportasi-Bappeda-Aceh.csv');

        // Check if the file exists
        if (!file_exists($csvPath)) {
            abort(404, "CSV file not found at $csvPath");
        }

        // Open the CSV file and read data
        $data = array_map('str_getcsv', file($csvPath));
        $headers = array_map('strtolower', $data[0]); // Ensure headers are lowercase
        $rows = array_slice($data, 1);

        // Process data into a suitable format for Chart.js
        $processedData = $this->processData($rows, $headers);

        return view('dashboard', compact('processedData'));
    }

    private function processData($rows, $headers)
    {
        $data = [];

        foreach ($rows as $row) {
            // Check if the number of headers and row values are the same
            if (count($headers) !== count($row)) {
                \Log::warning("Row does not match header count. Row: " . implode(',', $row));
                continue; // Skip this row
            }

            $item = array_combine($headers, $row);

            if ($item === false) {
                \Log::warning("array_combine failed for row: " . implode(',', $row));
                continue; // Skip this row
            }

            if (!isset($data[$item['merk']])) {
                $data[$item['merk']] = ['merk' => $item['merk'], 'types' => []];
            }

            if (!isset($data[$item['merk']]['types'][$item['type']])) {
                $data[$item['merk']]['types'][$item['type']] = [];
            }

            $data[$item['merk']]['types'][$item['type']][] = [
                'no_polisi' => $item['no polisi'],
                'tahun_pembuatan' => $item['tahun pembuatan']
            ];
        }

        return array_values($data);
    }
}
