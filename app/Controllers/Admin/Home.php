<?php

namespace App\Controllers\Admin;
use App\Models\SiswaModel;
use App\Models\PublishModel;
use App\Models\SekolahModel;
use App\Models\InfoModel;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Home extends BaseController
{
  protected $siswa;
  protected $publish;
  protected $sekolah;
  protected $info;
  
  public function __construct(){
    $this->siswa = new SiswaModel();
    $this->publish=new PublishModel();
    $this->sekolah=new SekolahModel();
    $this->info=new InfoModel();
  }
  public function index()
  {
    $data=[
      'title'=>'Halaman beranda',
      'act' =>'beranda',
      'clr'=>'purple',
      'clulus'=>$this->siswa->cLulus(),
      'cgagal'=>$this->siswa->cGagal(),
      'waktu'=>$this->publish->getWaktu(),
      'sch'=>$this->sekolah->getSch(),
      'info' => $this->info->getPengumuman(),
    ];
    return view('admin/home',$data);
  }
}
