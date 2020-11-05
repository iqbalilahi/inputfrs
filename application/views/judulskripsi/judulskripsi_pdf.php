<?php
            $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
            // $pdf->SetTitle('Daftar FRS');
            //$pdf->SetHeaderData("", 40, 'Input Judul Skripsi', "STMIK Bani Saleh \n", array(0,0,0));
            
            $pdf->SetMargins(10, 25, 20); // kiri, atas, kanan
            $pdf->SetHeaderMargin(5);
            $pdf->SetTopMargin(20);
            $pdf->setFooterMargin(10);
            $pdf->SetFont('times','',8);
            $pdf->SetAutoPageBreak(true);
            $pdf->SetAuthor('Admin');
            $pdf->SetDisplayMode('real', 'default');
            $pdf->AddPage();
            $i=0;
            $html='
            
                <h2 class="box-title" style="margin-top:0px"></h2>
        <table align="left">
            <tr><td>Npm</td><td>'.$npm.'</td></tr>
            <tr><td>Nama Mhs</td><td>'.$nama_mhs.'</td></tr>
            <tr><td>Nama Prodi</td><td>'.$nama_prodi.'</td></tr>
            <tr><td>judul Skripsi</td><td>'.$judulskripsi.'</td></tr>
            <tr><td>Perusahaan</td><td>'.$perusahaan.'</td></tr>
            <tr><td>Alamat P</td><td>'.$alamat_p.'</td></tr>
            <tr><td>Email</td><td>'.$email.'</td></tr>
            <tr><td>Pembimbing A</td><td>'.$nama_dosen_a.'</td></tr>
            <tr><td>Pembimbing B</td><td>'.$nama_dosen_b.'</td></tr>
            <tr><td>Tahun Akademik</td><td>'.$tahun_akademik.'</td></tr>';
            
            $html.='</tbody>';
            
            $html.='</table>';
            $html.='<br>
                <div class="box box-warning box-solid">
                <div class="box-body">';
            $html.='</div>';
            $html.='<table align="center">
            <tr>';
                foreach ($dosen_data as $dosen) 
                {
                    $html.='<th>'. $dosen->jabatan.'</th>
                    ';
                }
                $html.='
                    <th></th>
                    <th>Nama Mahasiswa</th>
                </tr>
                <tr>
                    <th></th>
                    <th></th>
                    <th>'.$nama_mhs.' </th>
                </tr>
                <tr>
                ';
                foreach ($dosen_data as $a) 
                {
                    $html.='<th>'. $a->nama_dosen.'</th>';
                }
                    $html.='
                    <th></th>
                    <th></th>
                </tr>';
            $html.='</table>';
            $html.='</div>';
            $pdf->writeHTML($html, true, false, true, false, '');
            $pdf->Output('INPUT JUDUL SKRIPSI.pdf', 'I');

// $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
//     $pdf->SetTitle('FIFO');
//     $pdf->SetTopMargin(20);
//     $pdf->setFooterMargin(20);
//     $pdf->SetAutoPageBreak(true);
//     $pdf->SetAuthor('Author');
//     $pdf->SetDisplayMode('real', 'default');
//     $pdf->AddPage();
//     $pdf->Write(5, 'Please Contact Admin for Premium account.');
//     $pdf->Output('contoh1.pdf', 'I');
?>