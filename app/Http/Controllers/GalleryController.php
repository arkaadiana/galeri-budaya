<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        // Function to read all images in a directory
        function getImagesFromDirectory($directory, $searchQuery = null) {
            $images = [];
            if (is_dir($directory)) {
                $files = scandir($directory);
                foreach ($files as $file) {
                    if ($file !== '.' && $file !== '..') {
                        $filePath = $directory . '/' . $file;

                        // Normalisasi nama file dan query pencarian dengan menghapus karakter selain huruf dan angka
                        $normalizedFileName = strtolower(preg_replace('/[^a-z0-9]/', '', $file));  // Menghapus karakter selain huruf dan angka
                        $normalizedSearchQuery = strtolower(preg_replace('/[^a-z0-9]/', '', $searchQuery)); // Normalisasi query pencarian

                        // Jika query pencarian cocok dengan nama file yang sudah dinormalisasi, tambahkan ke array gambar
                        if (is_file($filePath) && (!$searchQuery || stripos($normalizedFileName, $normalizedSearchQuery) !== false)) {
                            $images[] = asset($filePath); // Convert to public asset URL
                        }
                    }
                }
            }
            return $images;
        }

        // Ambil query pencarian dari input
        $searchQuery = $request->input('search');
        
        // Ambil data gambar dari masing-masing direktori
        $imageData = [
            'badung' => getImagesFromDirectory(public_path('img/Badung'), $searchQuery),
            'bangli' => getImagesFromDirectory(public_path('img/Bangli'), $searchQuery),
            'buleleng' => getImagesFromDirectory(public_path('img/Buleleng'), $searchQuery),
            'denpasar' => getImagesFromDirectory(public_path('img/Denpasar'), $searchQuery),
            'gianyar' => getImagesFromDirectory(public_path('img/Gianyar'), $searchQuery),
            'karangasem' => getImagesFromDirectory(public_path('img/Karangasem'), $searchQuery),
            'klungkung' => getImagesFromDirectory(public_path('img/Klungkung'), $searchQuery),
            'tabanan' => getImagesFromDirectory(public_path('img/Tabanan'), $searchQuery),
        ];

        // Pass image data as JSON to the view
        return view('galery', ['imageDataJson' => json_encode($imageData)]);
    }
}
