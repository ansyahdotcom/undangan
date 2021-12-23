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
}
