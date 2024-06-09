<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    
    protected $table = 'kategori';
    protected $primaryKey = 'id_kategori';
    protected $fillable = ['id_kategori','kategori'];

    public function mading()
    {
        return $this->hasMany(mading::class,'kategori_id','id_kategori');
    }
}
