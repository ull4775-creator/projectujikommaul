<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Input extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_pelaporan';
    protected $guarded =[];
    protected $table = 'inputs';
    protected $fillable = [
    'nik',
    'alamat',
    'id_kategori',
    'lokasi',
    'ket',
    'foto',
    'kode',
    'status'
];


    public function pengguna(){
        return $this->belongsTo(Pengguna::class,'nik','nik');
    }

    public function kategori(){
        return $this->belongsTo(Kategori::class,'id_kategori','id_kategori');
    }

    public function aspirasi(){
        return $this->hasOne(Aspirasi::class, 'id_aspirasi','id_aspirasi');
    }
    public function user()
{
    return $this->belongsTo(User::class, 'id_pengguna');
}
}
