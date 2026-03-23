<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_kategori';
    protected $guarded = [];

    public function input() {
        return $this->belongsTo(Input::class);
    }
    public function user()
{
    return $this->belongsTo(User::class, 'id_pengguna');
}

public function kategori()
{
    return $this->belongsTo(Kategori::class, 'id_kategori');
}
public function pengguna()
{
    return $this->belongsTo(User::class, 'id_pengguna');
}

}
