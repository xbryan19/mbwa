<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkpoint extends Model
{
    protected $connection = 'HRDSQL9';
    protected $table = 'Checkpoints';
}
