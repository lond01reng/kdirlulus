<?php

namespace App\Controllers\Admin;
use App\Models\SiswaModel;
use App\Models\SekolahModel;
use App\Models\PublishModel;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Siswa extends BaseController
{
  private $siswa;
  protected $sekolah;
  protected $publish;
  protected $isPublish;
  public function __construct(){
    $this->siswa = new SiswaModel();
    $this->sekolah=new SekolahModel();
    $this->publish=new PublishModel();
    $hasil=$this->publish->getWaktu();
    if($hasil){
      $this->isPublish = $hasil->pb_status;
    }else{
      $this->isPublish = null;
    }
  }
  public function index()
  {
    $data=[
      'title'=>'Manajemen Data Siswa',
      'act' =>'data_siswa',
      'clr'=>'purple',
      'sch'=>$this->sekolah->getSch(),
      'siswa'=>$this->siswa->getData(),
      'del_siswa'=>$this->siswa->getHapus(),
      'publis'=>$this->isPublish,
      ];
    return view('admin/data_siswa',$data);
  }
  public function mTambahSiswa()
  {
    return view('admin/modal_siswa');
  }

  public function simpanSiswa() {
    if($this->request->getMethod()==='POST'){
      $vRule=[
        'f_csv'=>[
          'rules'=>'uploaded[f_csv]|max_size[f_csv,2048]|ext_in[f_csv,csv]',
          'errors'=>[
            'uploaded' => 'Silakan pilih file untuk di-upload.',
            'max_size' => 'Ukuran file melebihi batas maksimum 1MB.',
            'ext_in' => 'Hanya file CSV yang diperbolehkan untuk di-upload.',
          ]
        ],
      ];
      if(!$this->validate($vRule)){
        $errors=$this->validator->getErrors();
        $errMsg=implode(", ",$errors);
        return redirect()->back()->with('errors',$errMsg)->withInput();
      }
      $file=$this->request->getFile('f_csv');
      $newf=$file->getRandomName();
      $file->move(WRITEPATH.'temp',$newf);
      $newPath=WRITEPATH.'temp/'.$newf;
      $result=$this->siswa->importSiswa($newPath);
      if($result==='file_not_found'){
        return redirect()->to('admin/data_siswa')->with('errors',['File csv tidak ditemukan']);
      }elseif($result==='invalid_data'){
        return redirect()->to('admin/data_siswa')->with('errors',['Data CSV tidak valid']);
      }elseif($result==='db_insert_error'){
        return redirect()->to('admin/data_siswa')->with('errors',['Gagal menyimpan ke dalam data base']);
      }elseif($result==='dbtp_insert_error'){
        return redirect()->to('admin/data_siswa')->with('errors',['Gagal menyimpan Tahun Pelajaran ke dalam data base']);
      }elseif($result==='invalid_column_names'){
        return redirect()->to('admin/data_siswa')->with('errors',['Gunakan template dan nama kolom jangan diganti']);
      }
      else{
        return redirect()->to('admin/data_siswa')->with('success', 'Data Siswa '.session()->getFlashdata('inth').' berhasil diimport!, Silahkan Logout dan Pilih Tahun Pelajaran yang sesuai');
      }
      
    }else{
      return redirect()->to('admin/data_siswa')->with('errors', ['Metode pengiriman file tidak valid.']);
    }
  }

  public function editBiodata($nis){
    $data=$this->siswa->getNis($nis);
    return view('admin/modal_edit_siswa', ['data' => $data]);
  }

  public function simpanBiodata($nis){
    $valRule=[
      'bio_nisn'=>'required|numeric|max_length[10]',
      'bio_nama'=>'required|alpha_space|min_length[3]|max_length[100]',
      'bio_tempat'=>'required|alpha_space|min_length[3]|max_length[24]',
      'bio_tgl'=>'required|valid_date',
      'bio_kelas'=>'required|alpha_numeric_space|min_length[3]|max_length[24]',
      'bio_jurusan'=>'required|alpha_numeric_space|min_length[3]|max_length[24]',
    ];
    $ge="Gagal Simpan Biodata, ";
    $valError=[
      'bio_nisn'=>[
        'required'=>$ge.'NISN Wajib Diisi',
        'numeric'=>$ge.'NISN Hanya angka yang boleh digunakan',
        'max_length'=> $ge.'NISN Maksimal 10 karakter'
      ],
      'bio_nama'=>[
        'required'=> $ge.'Nama Wajib Diisi',
        'alpha_space' => $ge.'Karakter Nama yang diperbolehkan hanya huruf',
        'min_length'=> $ge.'Minimal 3 karakter',
        'max_length' => $ge.'Maksimal 24 karakter'
      ],
      'bio_tempat'=>[
        'required'=> $ge.'Tempat Lahir Wajib Diisi',
        'alpha_space' => $ge.'Karakter Tempat Lahir yang diperbolehkan hanya huruf',
        'min_length'=> $ge.'Minimal 3 karakter',
        'max_length' => $ge.'Maksimal 100 karakter'
        ],
      'bio_tgl'=>[
        'required'=>$ge.'Tanggal Lahir Wajib Diisi',
        'valid_date'=> $ge.'Format tanggal lahir "yyyy-mm-dd"'
      ],
      'bio_kelas'=>[
        'required'=> $ge.'Kelas Wajib Diisi',
        'alpha_numeric_space' => $ge.'Karakter Kelas yang diperbolehkan hanya huruf, angka, spasi',
        'min_length'=> $ge.'Minimal 3 karakter',
        'max_length' => $ge.'Maksimal 24 karakter'
      ],
      'bio_jurusan'=>[
        'required'=> $ge.'Jurusan Wajib Diisi',
        'alpha_numeric_space' => $ge.'Karakter Jurusan yang diperbolehkan hanya huruf, angka, spasi',
        'min_length'=> $ge.'Minimal 3 karakter',
        'max_length' => $ge.'Maksimal 24 karakter'
      ],
    ];
    if(!$this->validate($valRule,$valError)){

      session()->setFlashdata('errors', $this->validator->getErrors());
      return redirect()->to(base_url('admin/data_siswa'));
    }else{
      $sw_nisn = $this->request->getPost('bio_nisn');
      $sw_nama = $this->request->getPost('bio_nama');
      $sw_tempat=$this->request->getPost('bio_tempat');
      $sw_tgl=$this->request->getPost('bio_tgl');
      $sw_kelas=$this->request->getPost('bio_kelas');
      $sw_jurusan=$this->request->getPost('bio_jurusan');
      $sw_stat=$this->request->getPost('bio_stat');

      $data=[
        'sw_nisn'=>$sw_nisn,
        'sw_nama'=>$sw_nama,
        'sw_tempat'=>$sw_tempat,
        'sw_tgl'=>$sw_tgl,
        'sw_kelas'=>$sw_kelas,
        'sw_jurusan'=>$sw_jurusan,
        'sw_status'=>$sw_stat,
      ];
      $this->siswa->updateBio($nis,$data);
      return redirect()->to(base_url('admin/data_siswa'))->with('success', 'Data berhasil dirubah');
    }
  }

  public function hapusSiswa($nis){
    $data=$this->siswa->getNis($nis);
    return view('admin/modal_dell_siswa', ['data' => $data]);
  }
  public function dellSiswa(){
    $sw_nis = $this->request->getPost('dlSiswa');
    $this->siswa->delSiswa($sw_nis);
    return  redirect()->to(base_url('admin/data_siswa'))->with('success', 'Data berhasil dihapus');
  }
  public function pulihkanSiswa($nis){
    $data=$this->siswa->getDel($nis);
    return view('admin/modal_restore_siswa', ['data' => $data]);
  }
  public function restoreSiswa(){
    $sw_nis = $this->request->getPost('rsSiswa');
    $this->siswa->restoreSiswa($sw_nis);
    print_r ($this->siswa->getLastQuery);
    return  redirect()->to(base_url('admin/data_siswa'))->with('success', 'Data berhasil dipulihkan');
  }
  // function cLulus(){
  //   echo $this->siswa->cLulus();
  //   echo $this->siswa->getLastQuery();
  // }

  // function cGagal(){
  //   echo $this->siswa->cGagal();
  //   echo $this->siswa->getLastQuery();
  // }
  

}
