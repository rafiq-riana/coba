<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Spp extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tbl_spp';
    protected $primaryKey = 'id_spp';
}
