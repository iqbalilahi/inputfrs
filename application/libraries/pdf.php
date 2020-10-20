<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';
class Pdf extends TCPDF
{
    function __construct()
    {
        parent::__construct();
    }

    //Page header
    public function Header() {
        // menentukan logo berdasrkan lokasi logo
        $image_file = K_PATH_IMAGES.'Logo.jpg';
        // membuat sebuah gambar dengan file gambar dari $image_file, koortdinat x=10, y=10, ukuran Width gambar 15, align T(top), dpi = 300
        $this->Image($image_file, 10, 10, 20, '', 'JPG', '', 'T', false, 500, '', false, false, 0, false, false, false);
        // membuat tulisan dengan font helvetica, tebal, ukuran 10
        $this->SetFont('times', 'B', 12);
        // menentukan judul yang akan tampil. width=0, height=15, text=<< TCPDF CODEDB.CO >>, align=C(center)
        $this->Cell(0, 15, 'Kartu Rencana Studi (KRS)', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }
 
    // Page footer
    public function Footer() {
        // Membuat posisi footer pada 15 mm dari bawah
        $this->SetY(-15);
        // menentukan tulisan miring dan ukuran font 8
        $this->SetFont('times', 'I', 8);
        // menampilkan nomor halaman
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'R', 0, '', 0, false, 'T', 'M');
    }


   
    function pdf()
    {
        $CI = & get_instance();
        log_message('Debug', 'mPDF class is loaded.');
    }
 
    function load($param=NULL)
    {
        include_once APPPATH.'/third_party/mpdf/mpdf.php';
         
        if ($params == NULL)
        {
            $param = '"en-GB-x","A4","","",10,10,10,10,6,3';         
        }
         
        return new mPDF($param);
    }

}
