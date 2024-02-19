<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategoribukurelasi extends Model
{
    use HasFactory;

    protected $table = 'kategoribukurelasi';

    protected $fillable = [
        'buku_id',
        'kategori_id'
    ];

    public function buku()
    {
        return $this->belongsTo(buku::class, 'buku_id');
    }

    public function kategori()
    {
        return $this->belongsTo(kategori::class, 'kategori_id');
    }
}
