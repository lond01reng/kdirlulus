<?php

namespace App\Controllers\Admin;
use App\Models\TapelModel;
use App\Models\PublishModel;
use App\Models\InfoModel;
use App\Models\SekolahModel;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Pengumuman extends BaseController
{
  protected $tapel;
  protected $publish;
  protected $info;
  protected $sekolah;
  public function __construct()
  {
    $this->tapel=new TapelModel();
    $this->publish=new PublishModel();
    $this->info=new InfoModel();
    $this->sekolah=new SekolahModel();

  }
  public function index()
  {
    $vwaktu = $this->publish->getWaktu();

    if (empty($vwaktu)) {
        $vwaktu = new \stdClass();
        $vwaktu->pb_status = '0';
    }
    $data=[
      'title'=>'Pengelolaan Pengumuman',
      'act' =>'pengumuman',
      'clr'=>'purple',
      'publish'=>$vwaktu,
      'info' => $this->info->getPengumuman(),
      'sch'=>$this->sekolah->getSch(),
    ];

    return view('admin/pengumuman',$data);
  }

  public function editWaktu(){
    // $tpl=$this->tapel->getTp();
    // if(!empty($tpl->getRow())){
      $data=$this->publish->getWaktu();
      return view('admin/modal_waktu', ['data' => $data]);  
  }

  public function simpanWaktu(){
    $valRule=[
      'wk_publis'=>'required|valid_date',
    ];
    $valError=[
      'wk_publis'=>[
        'required'=>'Tanggal  Wajib Diisi',
        'valid_date'=>'Format tanggal dan jam salah',
      ]
    ];
    if(!$this->validate($valRule,$valError)){
      session()->setFlashdata('errors', $this->validator->getErrors());
      return redirect()->to(base_url('admin/pengumuman'));
    }else{
      $waktu = $this->request->getPost('wk_publis');
      $fWaktu = date('Y-m-d H:i:s', strtotime($waktu));
      $this->publish->simpanWaktu($fWaktu);
      session()->setFlashdata('success', 'Waktu Pengumuman berhasil disimpan');
      return redirect()->to(base_url('admin/pengumuman'));
    }
  }

  public function editPublis(){
    $data=$this->publish->getWaktu();
    return view('admin/modal_publis', ['data' => $data]);
  }

  public function simpanPublis(){
    $stat=$this->request->getPost('publik');
    $this->publish->simpanPublis($stat);
    session()->setFlashdata('success', 'Pengumuman '.($stat==1?'Berhasil dipublikasikan':'Berhasil dirahasiakan'));
    return redirect()->to(base_url('admin/pengumuman'));
  } 


  public function simpanInfo()
  {
      $pengumumanData = $this->request->getPost('info');
      $infoId = $this->request->getPost('info_id');
      $validation = \Config\Services::validation();
      $allErrors = [];
      $validData = [];

      $validasiHasil = [];
      foreach ($pengumumanData as $index => $pengumuman) {
          $validation->reset();
          $validation->setRules([
              'info' => [
                  'rules' => 'required|trim|min_length[24]|alpha_numeric_punct',
                  'errors' => [
                      'required' => 'Isikan pengumuman ke ' . ($index + 1),
                      'min_length' => 'Pengumuman ke ' . ($index + 1) . ' minimal 24 karakter',
                      'alpha_numeric_punct' => 'Terdapat karakter ilegal dalam pengumuman ' . ($index + 1),
                  ]
              ],
          ]);
        if($validation->run(['info' => $pengumuman])) {
          $validData[] = [
            'if_desc' => $pengumuman,
            'if_tapel'=> session('tapel'),
          ];
        }else{
          // $tempErrors []= [$validation->getErrors()];
          $allErrors = array_merge_recursive($allErrors, $validation->getErrors());
        }
      }

      if(array_key_exists('info', $allErrors)){
        $toInfo=$allErrors['info'];
      }

      if (!empty($validData)) {
         
          foreach ($validData as $index => $data) {
              if (isset($infoId[$index]) && !empty($infoId[$index])) {
                  $data['if_id'] = $infoId[$index];
                  $this->info->update($infoId[$index], $data);
              } else {
                  $this->info->save($data);
              }
          }
      }
      if (!empty($allErrors)) {
        return redirect()->to('admin/pengumuman')->with('errors', $toInfo);
        // return redirect()->to('admin/pengumuman')->with('errors', $allErrors);
        
      }
      
      return redirect()->to('admin/pengumuman');

      
  }
  
  
  
  


  public function hapusInfo()
  {
    $requestData = $this->request->getJSON(); // Mengambil data dalam format JSON
    $infoId = $requestData->info_id; // Mengakses info_id dari request JSON

  if ($infoId) {
      $this->info->delete($infoId);  // Menghapus data dari database
      return $this->response->setJSON(['success' => true]);
    }

    return $this->response->setJSON(['success' => false]);
  }
  

}
