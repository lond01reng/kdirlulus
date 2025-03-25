<?php

namespace App\Controllers\Admin;
use App\Models\SekolahModel;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class User extends BaseController
{
  protected $sekolah;
  
  public function __construct(){
    $this->sekolah = new SekolahModel();
  }
  public function index()
  {
    $data=[
      'title'=>'Profil',
      'act'=>'profil',
      'clr'=>'purple',
      'sch' =>$this->sekolah->getSch(),
    ];
    return view('admin/profil', $data);
  }

  public function editSekolah(){
    if(!$this->validate([
      'npsn' => [
          'rules' => 'required|trim|regex_match[/^\d{8}$/]',
          'errors' => [
              'required' => 'Isikan NPSN',
              'regex_match' => 'NPSN berupa angka 8 karakter',
          ]
      ],
      'sch' => [
          'rules' => 'required|trim|regex_match[/^[a-zA-Z0-9 ]{10,64}$/]',
          'errors' => [
              'required' => 'Isikan Nama Sekolah',
              'regex_match' => 'Nama Sekolah 10 - 64 karakter',
          ]
      ],
      'ks' => [
          'rules' => 'required|trim|regex_match[/^[a-zA-Z0-9., ]{5,64}$/]',
          'errors' => [
              'required' => 'Isikan Nama Kepala Sekolah',
              'regex_match' => 'Nama Kepala Sekolah 5 - 64 karakter',
          ]
      ],
      'nip' => [
          'rules' => 'required|trim|regex_match[/^\d{18}$/]',
          'errors' => [
              'required' => 'Isikan NIP',
              'regex_match' => 'NIP berupa angka 18 karakter',
          ]
      ],
    ])){
      return redirect()->to(base_url('admin/profil'))->withInput()->with('errors', $this->validator->getErrors());
    }else{
      $data=[
        'sc_tapel'=>session('tapel'),
        'sc_npsn'=>esc($this->request->getPost('npsn')),
        'sc_nama'=>esc($this->request->getPost('sch')),
        'sc_ks'=>esc($this->request->getPost('ks')),
        'sc_nip'=>esc($this->request->getPost('nip')),
      ];
      $this->sekolah->editSekolah($data);
    }
  
    return redirect()->to(base_url('admin/profil'));
  }

  public function uploadLogoSekolah()
  {
      $imageFile = $this->request->getFile('image');
      if ($imageFile->isValid() && !$imageFile->hasMoved()) {
          $uploadPath = ROOTPATH . 'public/uploads/logo_sekolah.jpg';
          if (file_exists($uploadPath)) {
              unlink($uploadPath);
          }
          $imageFile->move(ROOTPATH . 'public/uploads', 'logo_sekolah.jpg');
          $imageName = base_url('uploads/logo_sekolah.jpg');
          return redirect()->to(base_url('admin/profil'))->with('message', 'Image uploaded successfully!')->with('image', $imageName);
      }

      return redirect()->to(base_url('admin/profil'))->with('message', 'Failed to upload image.');
  }

}
