<?php
error_reporting(E_ALL);
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;

class Siswa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('CRUDModel', 'crud');
	}

	public function index()
	{
		$data['title'] = "Data Siswa";
		$data['title_modal'] = "Import Data Siswa";


		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('siswa/index', $data);
		$this->load->view('templates/footer', $data);	
		$this->load->view('modals/bk/add_data_siswa', $data);	
	}

	public function import_siswa()
	{
		

		$extension = pathinfo($_FILES['data_siswa']['name'], PATHINFO_EXTENSION);

		if($extension == 'csv'){
			$reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
		} elseif($extension == 'xlsx') {
			$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
		} else {
			$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
		}

		// file path
		$spreadsheet    = $reader->load($_FILES['data_siswa']['tmp_name']);
		$allDataInSheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
		// array Count
		$arrayCount   = count($allDataInSheet);
		$flag         = 0;
		$createArray  = array(
			'NIS',
			'Nama Siswa',
			'L/P',
			'Tempat Lahir', 
			'Tanggal Lahir',
			'Tahun Lahir',
			'Agama',
			'Alamat',
			'Ayah', 
			'Ibu',
			'Asal Sekolah',
			'Usia',
			'Kelas',
			'Keterangan'
		);
		$makeArray    = array(
			'NIS'           => 'NIS',
			'Nama Siswa'    => 'Nama Siswa',
			'L/P'           => 'L/P',
			'Tempat Lahir'  => 'Tempat Lahir',
			'Tanggal Lahir' => 'Tanggal Lahir',
			'Tahun Lahir'   => 'Tahun Lahir',
			'Agama'         => 'Agama',
			'Alamat'        => 'Alamat',
			'Ayah'          => 'Ayah',
			'Ibu'           => 'Ibu',
			'Asal Sekolah'  => 'Asal Sekolah',
			'Usia'          => 'Usia',
			'Kelas'         => 'Kelas',
			'Keterangan'    => 'Keterangan'
		);
		$SheetDataKey = array();

		foreach ($allDataInSheet as $dataInSheet) {
			foreach ($dataInSheet as $key => $value) {
				if (in_array(trim($value), $createArray)) {
					$SheetDataKey[trim($value)] = $key;
				} 
			}
		}


		$dataDiff = array_diff_key($makeArray, $SheetDataKey);
		if (empty($dataDiff)) {
			$flag = 1;
		}
		// match excel sheet column
		if ($flag == 1) {
			for ($i = 18; $i <= $arrayCount; $i++) {
				$nis          = filter_var(trim($allDataInSheet[$i][$SheetDataKey['NIS']]), FILTER_SANITIZE_STRING);
				$nama         = filter_var(trim($allDataInSheet[$i][$SheetDataKey['Nama Siswa']]), FILTER_SANITIZE_STRING);
				$jenkel       = filter_var(trim($allDataInSheet[$i][$SheetDataKey['L/P']]), FILTER_SANITIZE_STRING);
				$tempat_lahir = filter_var(trim($allDataInSheet[$i][$SheetDataKey['Tempat Lahir']]), FILTER_SANITIZE_STRING);
				$tgl_lahir    = filter_var(trim($allDataInSheet[$i][$SheetDataKey['Tanggal Lahir']]), FILTER_SANITIZE_STRING);
				$thn_lahir    = filter_var(trim($allDataInSheet[$i][$SheetDataKey['Tahun Lahir']]), FILTER_SANITIZE_STRING);
				$agama        = filter_var(trim($allDataInSheet[$i][$SheetDataKey['Agama']]), FILTER_SANITIZE_STRING);
				$alamat       = filter_var(trim($allDataInSheet[$i][$SheetDataKey['Alamat']]), FILTER_SANITIZE_STRING);
				$ayah         = filter_var(trim($allDataInSheet[$i][$SheetDataKey['Ayah']]), FILTER_SANITIZE_STRING);
				$ibu          = filter_var(trim($allDataInSheet[$i][$SheetDataKey['Ibu']]), FILTER_SANITIZE_STRING);
				$asal_sekolah = filter_var(trim($allDataInSheet[$i][$SheetDataKey['Asal Sekolah']]), FILTER_SANITIZE_STRING);
				$usia         = filter_var(trim($allDataInSheet[$i][$SheetDataKey['Usia']]), FILTER_SANITIZE_STRING);
				$kelas        = filter_var(trim($allDataInSheet[$i][$SheetDataKey['Kelas']]), FILTER_SANITIZE_STRING);
				$ket          = filter_var(trim($allDataInSheet[$i][$SheetDataKey['Keterangan']]), FILTER_SANITIZE_STRING);

				$fetchData[] = array(
					'NIS'          => $nis, 
					'nama_siswa'   => $nama, 
					'jenkel'       => $jenkel,
					'tempat_lahir' => $tempat_lahir,
					'tanggal'      => $tgl_lahir,
					'thn_lahir'    => $thn_lahir,
					'agama'        => $agama,
					'alamat'       => $alamat,
					'ayah'         => $ayah,
					'ibu'          => $ibu,
					'asal_sekolah' => $asal_sekolah,
					'usia'         => $usia,
					'kelas'        => $kelas,
					'ket'          => $ket
				);
			}

			$data['dataInfo'] = $fetchData;
			echo "<pre>";
			var_dump($data['dataInfo']);
			// $this->site->setBatchImport($fetchData);
			// $this->site->importData();
		}

	}

}

/* End of file Siswa.php */
/* Location: ./application/controllers/Siswa.php */