<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatPengaduan extends Model
{
    use HasFactory;

    protected $table = 'chat_pengaduans'; // pastikan sesuai nama tabel

    protected $fillable = [
        'pengaduan_id',
        'pesan',
        'pengirim',
        'dibaca'
    ];

    public function pengaduan()
    {
        return $this->belongsTo(Pengaduan::class);
    }
}
