<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mading', function (Blueprint $table) {
            $table->id('id');
            $table->string('judul', '40');
            $table->string('slug', '40');
            $table->string('gambar','80');
            $table->text('konten');
            $table->integer('kategori_id','4');
            $table->string('pembuat', '65');
            
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
    }
};
