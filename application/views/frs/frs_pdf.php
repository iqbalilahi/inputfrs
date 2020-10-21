<?php
            $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
            // $pdf->SetTitle('Daftar FRS');
            // $pdf->SetHeaderData("Logo.jpg", 40, 'Daftar FRS', "STMIK Bani Saleh \n", array(0,0,0));
            
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
            <br>
            
            <table>
                <tr>
                    <th>NPM :'.$npm.'</th>
                    <th>Nama : '.$nama_mhs.'</th>
                    <th>Jenjang Studi : '.$kode_studi." - ". $nama_prodi.'</th>
                </tr>
                <tr>
                    <th>Status Kuliah : '. $nama_status.'</th>
                    <th>Semester : '. $semester. " - ". $tahun_akademik.'</th>
                </tr>
                
            </table>
                <div class="box box-warning box-solid">
                <div class="box-body">
                <h2 class="box-title" style="margin-top:0px"></h2>
        <table border="1" align="center">
            <thead>
                <tr>
                    <th width="20px">No</th>
            <th width="70px">Kode Matkul</th>
            <th width="150px">Nama Matkul</th>
            <th>SKS</th>
            <th>Status Nilai</th>
            <th width="150px">Nama Dosen</th>
                </tr>
            </thead>
        <tbody>';
            $total_sks = 0;
            $start = 0;
            foreach ($frs_data as $frsku) 
                {
        
                    $html.='<tr bgcolor="#ffffff">
                            <td width="20px">'.++$start.'</td>
                            <td width="70px">'.$frsku->kode_matkul.'</td>
                            <td width="150px">'.$frsku->nama_matkul.'</td>
                            <td>'.$frsku->sks.'</td>
                            <td>'.$frsku->status_nilai.'</td>
                            <td width="150px">'.$frsku->nama_dosen.'</td>
                            <input type ="hidden>"'.$total_sks = $frsku->sks.'/>
                        </tr>';
                }
            
            $html.='</tbody>';
            $html.='<tr>
                <td></td>
                <td></td>
                <td>SKS Baru</td>
                <td>'.$total_sks = (int)$total_sks + $frsku->sks.'</td>
            </tr>';
            $html.='</table>';
            $html.='</div>';
            $html.='<table align="center">
            <tr>
                    <th>Pembimbing Akademik</th>
                    <th></th>
                    <th>Nama Mahasiswa</th>
                </tr>
                <tr>
                <th></th>';
                foreach ($dosen_data as $dosen) 
                {
                    $html.='<th>'. $dosen->jabatan.'</th>
                    ';
                }
                $html.='<th>'.$nama_mhs.'</th>
                <th> </th>
                </tr>
                <tr>
                    <th></th>';
                foreach ($dosen_data as $a) 
                {
                    $html.='<th>'. $a->nama_dosen.'</th>';
                }
                    $html.='<th></th>
                </tr>';
            $html.='</table>';
            $html.='</div>';
            $pdf->writeHTML($html, true, false, true, false, '');
            $pdf->Output('FRS.pdf', 'I');

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