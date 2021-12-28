<?php

namespace App\Models;

use CodeIgniter\Model;

class Dt_rsvpModel extends Model
{
    protected $table = 'dt_rsvp';
    protected $allowedFields = [
        'rsvp_id',
        'tr_id',
    ];

    public function getRSVP($tr_id)
    {
        return $this->join('rsvp', 'rsvp.id_rsvp = dt_rsvp.rsvp_id')
                    ->where('tr_id', $tr_id)
                    ->findAll();
    }
}
