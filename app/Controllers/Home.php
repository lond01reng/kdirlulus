<?php

namespace App\Controllers;
use App\Models\PublishModel;
use App\Models\SiswaModel;
use App\Models\SekolahModel;
use App\Models\InfoModel;

class Home extends BaseController
{
    protected $publish;
    protected $siswa;
    public function __construct()
    {
      $this->publish=new PublishModel();
      $this->siswa=new SiswaModel();
      $this->sekolah=new SekolahModel();
      $this->info=new InfoModel();
    }
    public function index()
    {
      $sch=!empty($this->sekolah->getPSch())?$this->sekolah->getPSch():$this->sekolah->getOSch();

      $data=[
          'title'=>'Pengumuman Kelulusan',
          'act' =>'pengumuman',
          'clr'=>'purple',
          'publish'=>$this->publish->waktuPublis(),
          'sch'=>$sch,
          
        ];
      return view('publik',$data);
    }
    public function detailInfo(){
      $info = session()->get('data');
      $sch=!empty($this->sekolah->getPSch())?$this->sekolah->getPSch():$this->sekolah->getOSch();
      if(!empty($info)){
        $data=[
          'title'=>'Hasil Kelulusan '.$info->sw_nama,
          'act' =>'pribadi',
          'clr'=>'purple',
          'publish'=>$this->publish->waktuPublis(),
          'siswa'=>$info,
          'sch'=>$sch,
          'info'=>$this->info->getPengumuman(),
        ];
        return view('detail_info',$data);
      }else{
        return redirect()->to(base_url());
      }
    }
    public function getSiswaLulus(){
      $nisn=esc($this->request->getPost('nisn'));
      $tgl=esc($this->request->getPost('tgl'));
      if(!$this->validate([
        'nisn' => [
          'rules'=> 'required|regex_match[/^[0-9]{10}$/]',
          'errors' => [
            'required'=>'NISN Wajib Diisi',
            'regex_match'=>'NISN harus 10 karakter angka',
          ]
        ],
        'tgl'=>[
          'rules'=>'required|valid_date',
          'errors'=>[
            'required'=>'Tanggal Lahir Wajib Diisi',
            'valid_date'=> 'Format tanggal "yyyy-mm-dd"'
          ]
        ]
      ]))
      {
        return redirect()->to(base_url('/'))->withInput()->with('errors', $this->validator->getErrors());
      }else{
        $info=$this->siswa->getNisn($nisn,$tgl);
        return redirect()->to(base_url('info_detail'))->with('data', $info);
      }
    }
}
