<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\PublishModel;

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
        $this->join('publish','pb_id=if_tapel');
        // $this->where('pb_status','1');
        return $this->findAll();
    }
    public function getInfo()
    {
        $this->join('publish','pb_id=if_tapel');
        $this->where('pb_status','1');
        return $this->findAll();
    }

    public function savePengumuman($data)
    {
        return $this->save($data);
    }
    
    public function deleteInfo($id)
    {
        return $this->delete($id);
    }

}
