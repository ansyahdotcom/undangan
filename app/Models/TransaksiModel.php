<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';
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


    // table transaksi join table template
    public function getTransaksi()
    {
        return $this->join('template', 'transaksi.tm_id = template.id_tm')
                    ->orderBy('transaksi.id_tr', 'DESC')
                    ->get();
    }

    // get by permalink
    public function getById($id)
    {
        return $this->join('template', 'transaksi.tm_id = template.id_tm')
                    ->where('id_tr', $id)
                    ->first();
    }
}
