<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kelas extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tbl_kelas';
    protected $primaryKey = 'id_kelas';
    protected $fillable = ['nama_kelas', 'jurusan'];
}
