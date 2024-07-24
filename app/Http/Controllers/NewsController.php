<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\DomCrawler\Crawler;

class NewsController extends Controller
{
    public function getNews()
    {
        try {
            // Ambil data berita dari situs BAPPEDA Aceh
            $response = Http::get('https://bappeda.acehprov.go.id/berita');

            // Proses respons untuk mengekstrak artikel berita
            $newsData = $this->parseNewsData($response->body());

            // Kembalikan data berita sebagai respons JSON
            return response()->json($newsData);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch news.'], 500);
        }
    }

    private function parseNewsData($html)
    {
        $crawler = new Crawler($html);

        // Temukan elemen berita di halaman
        $newsItems = $crawler->filter('.news-item'); // Sesuaikan selector sesuai struktur HTML yang benar

        $newsData = [];

        $newsItems->each(function (Crawler $node) use (&$newsData) {
            try {
                $title = $node->filter('.news-title')->text(); // Sesuaikan selector dengan yang benar
                $description = $node->filter('.news-description')->text(); // Sesuaikan selector dengan yang benar
                $link = $node->filter('a')->attr('href'); // Ambil link dari elemen anchor
                $imageUrl = $node->filter('img')->attr('src'); // Ambil URL gambar

                $newsData[] = [
                    'title' => $title,
                    'description' => $description,
                    'link' => $link,
                    'imageUrl' => $imageUrl,
                ];
            } catch (\Exception $e) {
                // Handle any parsing errors
            }
        });

        return $newsData;
    }
}
