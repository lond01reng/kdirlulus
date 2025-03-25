<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\TapelModel;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Auth extends BaseController
{
  protected $useradm;
  protected $tapel;
  public function __construct()
  {
    $this->useradm=new UserModel();
    $this->tapel=new TapelModel();
  }

  public function index()
  {
    // echo password_hash('loroG@2022', PASSWORD_BCRYPT);
    $data=[
      'tapel'=>$this->tapel->allTp()
    ];
    return view('login', $data);
  }

  public function logProses()
  {
    $session=session();
    $uname=esc($this->request->getPost('username'));
    $upass=esc($this->request->getPost('password'));
    $tapel=esc($this->request->getPost('tapel'));

    if(!$this->validate([
      'username' => [
        'rules'=> 'required|trim|regex_match[/^[a-z0-9]{5,}$/]',
        'errors' => [
          'required'=> "Username wajib diisi",
          'regex_match'=>'Username minimal 5 digit huruf kecil atau angka'
        ]
      ],
      'password'=>[
        'rules'=> 'required|trim|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/]',
        'errors'=> [
          'required'=>'Password Wajib diisi',
          'regex_match' => 'Format password tidak sesuai'
        ]
      ]
    ])){
      return redirect()->to(base_url('auth'))->withInput()->with('errors', $this->validator->getErrors());
    }else{
      $cekus=$this->useradm->cekuser($uname);
      if(!empty($cekus)){
        $pasw=$cekus->adm_pasw;
        $verifpas=password_verify(strrev($upass),$pasw);
        if($verifpas AND $cekus->adm_status=='vl'){
          $sessdata=[
            'name'=>$cekus->adm_nama,
            'isname'=>strrev($cekus->adm_uname),
            'level'=> $cekus->adm_level,
            'logged_in' => TRUE,
            'tapel'=>$tapel
          ];
          session()->set($sessdata);
          return redirect()->to(base_url('admin/beranda'));
        }else{
          session()->setFlashdata('errors.password', 'Password salah');
          return redirect()->to(base_url('auth'))->withInput();
        }
      }else{
        session()->setFlashdata('errors.username', 'User tidak diketemukan');
        var_dump($cekus);
        // echo $this->useradm->getLastQuery();
        return redirect()->to(base_url('auth'))->withInput();
      }
    }
  }

  public function gantiPassword(){
    $oldpass=esc($this->request->getPost('oldpass'));
    $newpass=esc($this->request->getPost('newpass'));
    $repass=esc($this->request->getPost('repass'));

    if($this->validate([
      'oldpass'=>[
        'rules'=> 'required',
        'errors'=> [
          'required'=>'Password Lama Wajib diisi',
        ]
      ],
      'newpass'=>[
        'rules'=> 'required|trim|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/]',
        'errors'=> [
          'required'=>'Password Baru Wajib diisi',
          'regex_match' => 'Password minimal 8 karakter dengan memuat huruf kecil, kapital, angka dan karakter khusus.'
        ]
      ],
      'repass'=>[
        'rules'=> 'required|trim|matches[newpass]',
        'errors'=> [
          'required'=>'Ulangi Password Baru Wajib diisi',
          'matches' => 'Password baru berbeda.'
        ]
      ],
    ])){
      $sesname=strrev(session('isname'));
      $cekpas=$this->useradm->cekuser($sesname);
      if(!empty($cekpas)){
        $pasw= $cekpas->adm_pasw;
        $verifpas=password_verify(strrev($oldpass),$pasw);
        if($verifpas){
          $update=$this->useradm->gantiPassword($sesname, $newpass);
          if($update){
              return $this->logout();
            }else{
              session()->setFlashdata('errors', 'Gagal Mengganti Password');
              return redirect()->back();
            }
        }else{
          session()->setFlashdata('errors.oldpass', 'Password lama tidak sesuai');
          return redirect()->back();
        }
      }

    }else{
      $errors=$this->validator->getErrors();
      foreach($errors as $field =>$pesan){
        session()->setFlashdata('errors.'.$field,$pesan);
      }
      return redirect()->back();
    }

  }

  public function logout()
  {
      session()->destroy();
      return redirect()->to(base_url('auth'));
  }
}
