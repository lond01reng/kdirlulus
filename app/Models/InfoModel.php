<?php

namespace App\Models;

use CodeIgniter\Model;

class InfoModel extends Model
{
    protected $table            = 'info';
    protected $primaryKey       = 'if_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['if_desc','if_tapel'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'if_cr';
    protected $updatedField  = 'if_up';
    protected $deletedField  = 'if_dl';

    public function getPengumuman()
    {
        return $this->findAll();
    }

    public function savePengumuman($data)
    {
        // print_r($data);
        return $this->save($data);
    }
    
    public function deleteInfo($id)
    {
        return $this->delete($id);
    }

}
