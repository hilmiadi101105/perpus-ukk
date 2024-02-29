<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buku extends Model
{
    use HasFactory;

    protected $table = 'buku';

    protected $fillable = [
        'judul',
        'foto',
        'penulis',
        'penerbit',
        'tahun_terbit'
    ];

    

    public function Kategoribukurelasi()
    {
        return $this->hasMany(Kategoribukurelasi::class, 'buku_id');
    }


    public function kategori()
    {
        return $this->belongsToMany
        (Kategori::class, 'kategoribukurelasi', 'buku_id', "kategori_id");
    }
}
