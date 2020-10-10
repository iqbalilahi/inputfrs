<?php
            $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
            // $pdf->SetTitle('Daftar FRS');
            // $pdf->SetHeaderData("Logo.jpg", 40, 'Daftar FRS', "STMIK Bani Saleh \n", array(0,0,0));
            
            $pdf->SetMargins(10, 25, 10); // kiri, atas, kanan
            $pdf->SetHeaderMargin(5);
            $pdf->SetTopMargin(20);
            $pdf->setFooterMargin(10);
            $pdf->SetAutoPageBreak(true);
            $pdf->SetAuthor('Admin');
            $pdf->SetDisplayMode('real', 'default');
            $pdf->AddPage();
            $i=0;
            $html='
            <br>
            
            <hr>
            <h3>Daftar FIFO</h3>
                    </div><!-- /.box-header -->
                <div class="box-body">
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="20px">No</th>
            <th>Nama Customer</th>
            <th width="50px">Nama Paket</th>
            <th>Tgl Daftar</th>
            <th>Tgl Bayar</th>
            <th width="100px">Status Pesanan</th>
            <th width="80px">Status Bayar</th>
            <th width="100px">Status Verifikasi Berkas</th>
                </tr>
            </thead>
        <tbody>';
        // $start = 0;
        //     foreach ($frs_data as $frs) 
        //         {
        //             $pesan = $pendaftaran->status_pesanan==1?'Terverifikasi':'Belum Terverifikasi';
        //             $bayar = $pendaftaran->status_bayar==1?'Sudah Bayar':'Belum Bayar';
        //             $berkas = $pendaftaran->status_verifikasi_berkas==1?'Sudah Mengirim Berkas':'Belum Mengirim Berkas';
        //             $html.='<tr bgcolor="#ffffff">
        //                     <td width="20px">'.++$start.'</td>
        //                     <td>'.$pendaftaran->nama_lengkap_c.'</td>
        //                     <td width="50px">'.$pendaftaran->nama_paket.'</td>
        //                     <td>'.$pendaftaran->tgl_daftar.'</td>
        //                     <td>'.$pendaftaran->tgl_bayar.'</td>
        //                     <td width="100px">'.$pesan.'</td>
        //                     <td width="80px">'.$bayar.'</td>
        //                     <td width="100px">'.$berkas.'</td>
        //                 </tr>';
        //         }
            $html.='</tbody>';
            $html.='</table>';
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