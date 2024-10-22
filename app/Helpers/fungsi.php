<?php

namespace App\Helpers;

use App\Models\produkdetail;
use App\Models\restok;
use Illuminate\Support\Facades\DB;

class Fungsi
{
    // rata-rata = inputan = produk_id
    public static function app_namapendek()
    {
        return 'CV. LANGGENG JAYA';
    }

    public static function app_nama()
    {
        return 'TOKO SANITARY';
    }
    public static function app_logo()
    {
        return asset('assets/img/apple-touch-icon.png'); // Correct path to your logo
    }

    public static function angka($angka)
    {
        //inputan : angka
        $hasil = (int) filter_var($angka, FILTER_SANITIZE_NUMBER_INT);
        return $hasil;
    }

    public static function rupiah($angka)
    {
        //inputan : angka
        $hasil = (int) filter_var($angka, FILTER_SANITIZE_NUMBER_INT);
        $hasil_rupiah = "Rp " . number_format($hasil, 2, ',', '.');
        return $hasil_rupiah;
    }
    public static function rupiahtanpanol($angka)
    {
        //inputan : angka
        $hasil = (int) filter_var($angka, FILTER_SANITIZE_NUMBER_INT);
        $hasil_rupiah = "Rp " . number_format($hasil, 0, ',', '.');
        return $hasil_rupiah;
    }
}
