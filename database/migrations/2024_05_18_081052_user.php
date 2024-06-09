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
        Schema::create('user', function(Blueprint $table){
            $table->id('id');
            $table->string('nama','45');
            $table->string('username','25')->unique();
            $table->string('password','255');
            $table->string('role', '8')->default('user');
            $table->boolean('pengajuan_penulis')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
