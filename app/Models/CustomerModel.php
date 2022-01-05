<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table = 'customer';
    protected $primaryKey = 'id_tr';
    protected $useTimestamps = true;
    protected $createdField = 'created_tr';
    protected $updatedField = 'updated_tr';
    protected $allowedFields = [
        'id_tr',
        'nama_pria',
        'nama_wanita',
        'nama_pgl_pria',
        'nama_pgl_wanita',
        'nama_ayah_pria',
        'nama_ibu_pria',
        'nama_ayah_wanita',
        'nama_ibu_wanita',
        'maps_akad',
        'tgl_akad',
        'alamat_akad',
        'maps_resepsi',
        'tgl_resepsi',
        'alamat_resepsi',
        'foto_pria',
        'foto_wanita',
        'permalink',
        'nomor_hp',
        'tm_id'
    ];

    // get by permalink
    public function getById($id)
    {
        return $this->where('id_tr', $id)
                    ->first();
    }
}
