<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{   
    protected $table = "karyawan";
    protected $guarded = ['id'];
    // protected $fillable = ['namaKaryawan','noTelepon','alamat', 'status', 'type_id'];

    public function user()
    {
        return $this->belongsTo(['../App\User','type_id','type']);
    }
}
