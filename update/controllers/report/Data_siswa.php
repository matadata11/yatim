<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_siswa extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_siswa', 'siswa');
        $this->load->library('Pdf');
    }
    
    public function pdf()
    {
        $pdf = new FPDF('L','mm','legal');
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);

        // Make Header
        $pdf->Image('./assets/images/pancacita.png',85,10,25);
        $pdf->Cell(330,7,'PEMERINTAH ACEH',0,1,'C');
        $pdf->SetFont('Arial','B',25);
        $pdf->Cell(330,7,'DINAS PENDIDIKAN',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        // $pdf->Cell(330,6,strtoupper('CABANG DINAS PENDIDIKAN WILAYAH KAB. BENER MERIAH'),0,1,'C');
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(330,7,'Jl.Tgk. H. Mohd Daud Beureueh Nomor 22 Banda Aceh Kode Pos 23121',0,1,'C');
        $pdf->Cell(330,4,'Telepon (0651) 2260, Faks (0651) 32386',0,1,'C');
        $pdf->Cell(330,4,'Website : disdik.acehprov.go.id, Email : disdik@acehprof.go.id',0,1,'C');
        // $pdf->Image('./public/img/logo.png',245,10,20);

        $pdf->SetLineWidth(0.5);                                                 
        $pdf->Line(15,42.1,342.5,42.1); 
        
        $pdf->SetLineWidth(1);                                                 
        $pdf->Line(15,41.1,342.5,41.1); 

        $pdf->SetLineWidth(0.1);                                                 
        $pdf->Ln();

        $pdf->SetFont('Arial','B',11);
        $pdf->Cell(330,10,'DATA SISWA YATIM DAN PIATU SMK ACEH',0,1, 'C');

        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(8.5,6,'',0,0);
        $pdf->Cell(10,6,'NO.',1,0, 'C');
        $pdf->Cell(55,6,'NAMA',1,0, 'C');
        $pdf->Cell(35,6,'NISN',1,0, 'C');
        $pdf->Cell(65,6,'NAMA SEKOLAH',1,0, 'C');
        $pdf->Cell(40,6,'NAMA BANK',1,0, 'C');
        $pdf->Cell(35,6,'NO REKENING',1,0, 'C');
        $pdf->Cell(20,6,'NOMINAL',1,0, 'C');
        $pdf->Cell(30,6,'NO HANDPHONE',1,0, 'C');
        $pdf->Cell(30,6,'KABUPATEN',1,1, 'C');
        $pdf->SetFont('Arial','',10);

		if ($this->session->userdata('level') == 'Admin' ) {
        $excel = $this->siswa->getSiswaverval();
        $no=1;
        foreach ($excel as $row){
            
            $pdf->Cell(8.5,6,'',0,0);
            $pdf->Cell(10,15,$no++,1,0,'C');
            $pdf->Cell(55,15,strtoupper($row['atas_nama']),1,0, 'C');
            $pdf->Cell(35,15,$row['nisn'],1,0,'C');
            $pdf->Cell(65,15,strtoupper($row['nm_sekolah']),1,0,'C');
            // $pdf->Cell(18,15,$row['waktu_presensi'].strtolower(' Wib'),1,0,'C');
            $pdf->Cell(40,15,strtoupper($row['nm_bank']),1,0,'C');
            $pdf->Cell(35,15,$row['no_rek'],1,0,'C');
            $pdf->Cell(20,15, number_format($row['nominal']),1,0,'C');
            $pdf->Cell(30,15,$row['no_hp'],1,0,'C');
            $pdf->Cell(30,15,$row['nama_kabupaten'],1,1,'C');

            // if($row['jarak'] > '1'){
            //     $pdf->Cell(76,15,$row['home_base'],1,0,'C');
            // }elseif($row['jarak'] <= '1'){
            //     $pdf->Cell(76,15,$row['home_base'],1,0,'C');
            // }

            // $pdf->SetTextColor(255, 0, 0);
            // if($row['jarak'] > '1'){
            //     $pdf->Cell(25,15,'Diluar Kantor' ,1,1,'C');
            // }elseif($row['jarak'] > '0' && $row['jarak'] <= '1'){
            //     $pdf->SetTextColor(0, 0, 0);
            //     $pdf->Cell(25,15,'Di Kantor',1,1,'C');
            // }elseif($row['jarak'] == null ){
            //     $pdf->SetTextColor(0, 0, 0);
            //     $pdf->Cell(25,15,'GPS MATI',1,1,'C');
            // }

            $pdf->SetTextColor(0, 0, 0);

            // $pdf->Cell(25,15, $pdf->Image('./public/img/presensi/'.$row['image'],$pdf->GetX(), $pdf->GetY(),25,15),1,1,'C');
        }
	}

		// super
		if ($this->session->userdata('level') == 'Super' ) {
		$excel = $this->siswa->getSiswaverval1();
        $no=1;
        foreach ($excel as $row){
            
            $pdf->Cell(8.5,6,'',0,0);
            $pdf->Cell(10,15,$no++,1,0,'C');
            $pdf->Cell(55,15,strtoupper($row['atas_nama']),1,0, 'C');
            $pdf->Cell(35,15,$row['nisn'],1,0,'C');
            $pdf->Cell(65,15,strtoupper($row['nm_sekolah']),1,0,'C');
            // $pdf->Cell(18,15,$row['waktu_presensi'].strtolower(' Wib'),1,0,'C');
            $pdf->Cell(40,15,strtoupper($row['nm_bank']),1,0,'C');
            $pdf->Cell(35,15,$row['no_rek'],1,0,'C');
            $pdf->Cell(20,15,'Rp '. number_format($row['nominal']),1,0,'C');
            $pdf->Cell(30,15,$row['no_hp'],1,0,'C');
            $pdf->Cell(30,15,$row['nama_kabupaten'],1,1,'C');

           
            // $pdf->Cell(25,15, $pdf->Image('./public/img/presensi/'.$row['image'],$pdf->GetX(), $pdf->GetY(),25,15),1,1,'C');
        }}

        // TTD Kepsek
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','',11);
        $pdf->Cell(203.5,6,'',0,0);
        $pdf->Cell(10,6,'Banda Aceh, '.indo_date(date('Y-m-d')),0,1, 'L');
        $pdf->Cell(203.5,6,'',0,0);
        $pdf->Cell(10,6,'Kepala Bidang',0,1, 'L');
        $pdf->Cell(203.5,6,'',0,0);
        $pdf->Cell(10,6,'Pembinaan Sekolah menengah Kejuruan',0,1, 'L');
        $pdf->Cell(203.5,22,'',0,1);
        $pdf->Cell(203.5,6,'',0,0);
        $pdf->SetFont('Arial','',11);
        $pdf->Cell(10,6,'ASBARUDDIN, S.T.P., M.M., M.Eng',0,1, 'L');
        $pdf->Cell(203.5,6,'',0,0);
        $pdf->Cell(10,6,'PEMBINA',0,1, 'L');

        $pdf->Cell(203.5,6,'',0,0);
        $pdf->Cell(10,6,'NIP. 19761012 200504 1 001',0,1, 'L');

		$pdf->SetY(15);
		//buat garis horizontal
		// $pdf->Line(10,$pdf->GetY(),200,$pdf->GetY());
		//Arial italic 9
		$pdf->SetFont('Arial','I',6);
		//nomor halaman
		$pdf->Cell(0,-22,'Halaman '.$pdf->PageNo().' dari https://sisy.notfound.id',0,1,'R');

		$pdf->SetTextColor(1, 2, 8);

        $pdf->SetTitle('sisy.view');
        $pdf->Output('Laporan_sisy'.date('Y-m-d').strtolower('.pdf'),'I');

		

    }

    // export data
	public function export_excel(){
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		// Panggil class PHPExcel nya
		$excel = new PHPExcel();
		// Settingan awal fil excel
		$excel->getProperties()->setCreator('My Notes Code')
			->setLastModifiedBy('My Notes Code')
			->setTitle("Data Siswa Yatim Piatu")
			->setSubject("Data SMK")
			->setDescription("Laporan Data Siswa Yatim dan Piatu SMK ACEH")
			->setKeywords("Data Siswa Yatim Piatu");
		// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
		$style_col = array(
		  	'font' => array('bold' => true), // Set font nya jadi bold
			'alignment' => array(
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
		),
			'borders' => array(
			'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
			'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
			'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
			'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			)
		);
	// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
	$style_row = array(
		'alignment' => array(
		'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
		),
		'borders' => array(
		'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
		'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
		'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
		'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
		)
		);
		$excel->setActiveSheetIndex(0)->setCellValue('A1', "LAMPIRAN : SURAT PERINTAH MEMBAYAR (SPM)"); // Set kolom A1 dengan tulisan "LAMPIRAN"
		$excel->setActiveSheetIndex(0)->setCellValue('A2', "NOMOR :                        /SPM-TU/1.01.0.00.0.00.01.03/2022"); // Set kolom A1 dengan tulisan "LAMPIRAN"
		$excel->setActiveSheetIndex(0)->setCellValue('A3', "BELANJA BEASISWA YATIM, PIATU DAN YATIM PIATU TAHUN 2022 TAHAP IV, SESUAI DENGAN SURAT KEPUTUSAN GUBERNUR ACEH NOMOR 422.5/252/2022 TANGGAL 14 FEBRUARI 2022 YANG DIBEBANKAN PADA DPA-SKPA DINAS PENDIDIKAN ACEH"); // Set kolom A1 dengan tulisan "LAMPIRAN"

		$excel->getActiveSheet()->mergeCells('A1:J1'); // Set Merge Cell pada kolom A1 sampai E1
		$excel->getActiveSheet()->mergeCells('A2:J2'); // Set Merge Cell pada kolom A1 sampai E1
		$excel->getActiveSheet()->mergeCells('A3:J3'); // Set Merge Cell pada kolom A1 sampai E1

		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A3')->getFont()->setBold(TRUE); // Set bold kolom A1

		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(12); // Set font size 15 untuk kolom A1
		$excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(12); // Set font size 15 untuk kolom A1
		$excel->getActiveSheet()->getStyle('A3')->getFont()->setSize(12); // Set font size 15 untuk kolom A1

		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
		$excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
		$excel->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
		// Buat header tabel nya pada baris ke 3
		$excel->setActiveSheetIndex(0)->setCellValue('A5', "NO"); // Set kolom A3 dengan tulisan "NO"
		$excel->setActiveSheetIndex(0)->setCellValue('B5', "NAMA"); // Set kolom B3 dengan tulisan "nisn"
		$excel->setActiveSheetIndex(0)->setCellValue('C5', "NISN"); // Set kolom C3 dengan tulisan "fullname"
		$excel->setActiveSheetIndex(0)->setCellValue('D5', "NAMA SEKOLAH"); // Set kolom D3 dengan tulisan "kabupaten_id"
		$excel->setActiveSheetIndex(0)->setCellValue('E5', "NAMA BANK"); // Set kolom E3 dengan tulisan "sekolah_id"
		$excel->setActiveSheetIndex(0)->setCellValue('F5', "NO REKENING"); // Set kolom E3 dengan tulisan "jurusan_1"
		$excel->setActiveSheetIndex(0)->setCellValue('G5', "NOMINAL"); // Set kolom E3 dengan tulisan "sekolah_id1"
		$excel->setActiveSheetIndex(0)->setCellValue('H5', "NO HANDPHONE"); // Set kolom E3 dengan tulisan "jurusan_2"
		$excel->setActiveSheetIndex(0)->setCellValue('I5', "KELAS"); // Set kolom E3 dengan tulisan "t_lahir"
		$excel->setActiveSheetIndex(0)->setCellValue('J5', "KABUPATEN"); // Set kolom F3 dengan tulisan "tgl_lahir"


		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
		$excel->getActiveSheet()->getStyle('A5')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B5')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C5')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D5')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E5')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F5')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('G5')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('H5')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('I5')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('J5')->applyFromArray($style_col);

		// Panggil function view yang ada di Modelsekolah untuk menampilkan semua data formulir
		$getformulir = $this->siswa->view();
		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		$numrow = 6; // Set baris pertama untuk isi tabel adalah baris ke 4
		foreach($getformulir as $data){ // Lakukan looping pada variabel siswa
		$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
		$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->atas_nama);
		$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->nisn);
		$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->nm_sekolah);
		$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->nm_bank);
		$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->no_rek);
		$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->nominal);
		$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->no_hp);
		$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->kelas);
		$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->nama_kabupaten  );
		
		// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
		$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
		
		  $no++; // Tambah 1 setiap kali looping
		  $numrow++; // Tambah 1 setiap kali looping
		}
		// Set width kolom
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(35); // Set width kolom B
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(15); // Set width kolom C
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(35); // Set width kolom D
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(20); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('F')->setWidth(20); // Set width kolom F
		$excel->getActiveSheet()->getColumnDimension('G')->setWidth(10); // Set width kolom G
		$excel->getActiveSheet()->getColumnDimension('H')->setWidth(15); // Set width kolom H
		$excel->getActiveSheet()->getColumnDimension('I')->setWidth(10); // Set width kolom I
		$excel->getActiveSheet()->getColumnDimension('J')->setWidth(20); // Set width kolom J
		
		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
		// Set orientasi kertas jadi LANDSCAPE
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		// Set judul file excel nya
		$excel->getActiveSheet(0)->setTitle("Laporan Data Siswa Yatim Piatu");
		$excel->setActiveSheetIndex(0);
		// Proses file excel
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Data Siswa Yatim Piatu.xlsx"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');
		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}

}

/* End of file Data_siswa.php */
