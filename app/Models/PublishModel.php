<?php

namespace App\Models;

use CodeIgniter\Model;

class PublishModel extends Model
{
    protected $table            = 'publish';
    protected $primaryKey       = 'pb_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['pb_id','pb_waktu','pb_status'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'pb_cr';
    protected $updatedField  = 'pb_up';
    protected $deletedField  = 'pb_dl';

    public function getWaktu(){
        $this->db->table($this->table);
        $this->where('pb_id', session('tapel'));
        $data = $this->first();

        // if ($data === null) {
        //     return ['pb_status' => 0];
        // }
        return $data;
    }

    public function simpanWaktu($waktu){
        $data = [
            'pb_waktu' => $waktu,
        ];
        $cek=$this->getWaktu();
        if (!empty($cek)) {
            $this->set($data);
            $this->where('pb_id', session('tapel'));
            return $this->update();
        } else {
            $data['pb_id'] = session('tapel');
            return $this->insert($data);
        } 
    }
    public function simpanPublis($stat){
        $this->set('pb_status', '0');
        $this->where('pb_id !=', session('tapel'));
        $this->update();

        $this->set('pb_status',$stat);
        $this->where('pb_id', session('tapel'));
        return $this->update();
    }
    public function waktuPublis(){
        $this->db->table($this->table);
        $this->orderBY('pb_id','desc');
        return $this->first();
    }
}
