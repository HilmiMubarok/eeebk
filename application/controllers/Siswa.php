<?php
error_reporting(E_ALL);
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;

class Siswa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('CRUDModel', 'crud');
		$this->load->model('SiswaModel', 'siswa');
	}

	public function findDuplicate($count)
	{
		return $count > 1;
	}

	public function index()
	{
		$data['title']       = "Data Siswa";
		$data['title_modal'] = "Import Data Siswa";
		$data['siswa']       = $this->crud->getAll('siswa')->result();

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
		// $allDataInSheet = $spreadsheet->getActiveSheet()->getCellByColumnAndRow()->getValue();

		// array Count
		$arrayCount   = count($allDataInSheet);
		$flag         = 0;
		$createArray  = array(
			'NIS',
			'Nama Siswa',
			'L/P',
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
				$agama        = filter_var(trim($allDataInSheet[$i][$SheetDataKey['Agama']]), FILTER_SANITIZE_STRING);
				$alamat       = filter_var(trim($allDataInSheet[$i][$SheetDataKey['Alamat']]), FILTER_SANITIZE_STRING);
				$ayah         = filter_var(trim($allDataInSheet[$i][$SheetDataKey['Ayah']]), FILTER_SANITIZE_STRING);
				$ibu          = filter_var(trim($allDataInSheet[$i][$SheetDataKey['Ibu']]), FILTER_SANITIZE_STRING);
				$asal_sekolah = filter_var(trim($allDataInSheet[$i][$SheetDataKey['Asal Sekolah']]), FILTER_SANITIZE_STRING);
				$usia         = filter_var(trim($allDataInSheet[$i][$SheetDataKey['Usia']]), FILTER_SANITIZE_STRING);
				$kelas        = filter_var(trim($allDataInSheet[$i][$SheetDataKey['Kelas']]), FILTER_SANITIZE_STRING);
				$ket          = filter_var(trim($allDataInSheet[$i][$SheetDataKey['Keterangan']]), FILTER_SANITIZE_STRING);

				$fetchData[] = array(
					'NIS'           => $nis, 
					'nama_siswa'    => $nama, 
					'jenkel'        => $jenkel,
					'tempat_lahir'  => '',
					'tanggal_lahir' => '',
					'agama'         => $agama,
					'alamat'        => $alamat,
					'nama_ayah'     => $ayah,
					'nama_ibu'      => $ibu,
					'asal_sekolah'  => $asal_sekolah,
					'usia'          => $usia,
					'kelas'         => $kelas,
					'keterangan'    => $ket
				);
			}

			$data['dataInfo'] = $fetchData;

			// $this->siswa->setBatchImport($fetchData);
			$importToMysql = $this->siswa->importData('siswa', $fetchData);

			if ($importToMysql) {
				$data = array(
					'pesan' => 'Data Berhasil Diimport',
					'icon'  => 'success'
				);
				$this->session->set_flashdata($data);
				redirect("siswa");
			} else {
				$data = array(
					'pesan' => 'Data Gagal Diimport',
					'icon'  => 'danger'
				);
				$this->session->set_flashdata($data);
				redirect("siswa");
			}
		}

	}

}

/* End of file Siswa.php */
/* Location: ./application/controllers/Siswa.php */