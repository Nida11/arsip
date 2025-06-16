<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('formatTanggalIndoJam')) {
    function formatTanggalIndoJam($datetimeStr)
    {
        $bulanIndo = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];

        if (!$datetimeStr || $datetimeStr == '0000-00-00 00:00:00') return '-';

        $date = date_create($datetimeStr);
        $tanggal = date_format($date, 'd');
        $bulan = (int)date_format($date, 'm');
        $tahun = date_format($date, 'Y');
        $jam = date_format($date, 'H:i');

        return "{$tanggal} {$bulanIndo[$bulan - 1]} {$tahun} {$jam}";
    }
    function formatTanggalIndo($dateStr)
    {
        $bulanIndo = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];

        if (!$dateStr || $dateStr == '0000-00-00') return '-';

        $date = date_create($dateStr);
        $tanggal = date_format($date, 'd');
        $bulan = (int)date_format($date, 'm');
        $tahun = date_format($date, 'Y');

        return "{$tanggal} {$bulanIndo[$bulan - 1]} {$tahun}";
    }
}
