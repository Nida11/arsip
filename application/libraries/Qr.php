<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class QR {

    private $CI;

    public function __construct()
    {
        $this->CI =& get_instance();

        // Load PHP QR Code Library
        require_once APPPATH . 'third_party/phpqrcode/qrlib.php';
    }

    // ============================================================
    // 1. GENERATE QR IMAGE
    // ============================================================
    public function generate($filename, $text)
    {
        $save_path = FCPATH . "uploads/qr/";

        if (!is_dir($save_path)) {
            mkdir($save_path, 0777, true);
        }

        $fullpath = $save_path . $filename;

        QRcode::png($text, $fullpath, QR_ECLEVEL_L, 4, 2);

        return $fullpath;
    }

    // ============================================================
    // 2. GENERATE SMALL PDF LABEL (58mm × 40mm)
    // ============================================================
   public function generate_pdf_label($qr_path, $output_path)
{
    require_once APPPATH . 'third_party/tcpdf/tcpdf.php';

    // pastikan path absolut
    $qr_path = realpath($qr_path);

    if (!file_exists($qr_path)) {
        die("QR FILE NOT FOUND: " . $qr_path);
    }

    $pdf = new TCPDF('P', 'mm', array(50, 50), true, 'UTF-8', false);
    $pdf->SetMargins(0, 0, 0);
    $pdf->SetAutoPageBreak(false, 0);
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);
    $pdf->AddPage();

    $qrSize = 38;
    $x = (50 - $qrSize) / 2;
    $y = (50 - $qrSize) / 2;

    $pdf->Image($qr_path, $x, $y, $qrSize, $qrSize, 'PNG');

    $pdf->Output($output_path, 'F');
}


}
