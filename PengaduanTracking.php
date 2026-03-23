<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengaduanTracking extends Model
{
    protected $table = 'pengaduan_trackings';

    protected $fillable = [
        'kode_unik',
        'pengaduan_id',
        'status',
        'feedback',
        'petugas_id'
    ];
    
    
    

    public function pengaduan()
    {
        return $this->belongsTo(Pengaduan::class);
    }
    public function petugas()
{
    return $this->belongsTo(Pengguna::class, 'petugas_id', 'id_pengguna');
}

}
