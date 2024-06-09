<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\kategori;


class mading extends Model
{
    use Sluggable;
    use HasFactory;
    
    protected $table = 'mading';
    protected $fillable = ['judul', 'slug', 'konten', 'kategori_id','gambar','pembuat'];

    protected $dates = ['created_at'];
    public function kategori() {
        return $this->belongsTo(kategori::class);
    }
    
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'judul'
            ]
        ];
    }
}
