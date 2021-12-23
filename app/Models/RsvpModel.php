<?php

namespace App\Models;

use CodeIgniter\Model;

class RsvpModel extends Model
{
    protected $table = 'rsvp';
    protected $primaryKey = 'id_rsvp';
    protected $useTimestamps = true;
    protected $createdField = 'created_rsvp';
    protected $updatedField = 'updated_rsvp';
    protected $allowedFields = [
        'id_rsvp',
        'nama_tamu',
        'jumlah',
        'no_wa',
        'kehadiran'
    ];
}
