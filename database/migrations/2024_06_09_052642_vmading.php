<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("
        CREATE VIEW vmading 
        AS
        SELECT
    `mading`.`id` AS `id`,
    `mading`.`judul` AS `judul`,
    `mading`.`slug` AS `slug`,
    `mading`.`gambar` AS `gambar`,
    `mading`.`konten` AS `konten`,
    `kategori`.`id_kategori` AS `id_kategori`,
    `kategori`.`kategori` AS `kategori`,
    `mading`.`pembuat` AS `pembuat`,
    `mading`.`created_at` AS `created_at`
FROM
    
        `mading`
    JOIN `kategori` ON
        
            `mading`.`kategori_id` = `kategori`.`id_kategori`
       
    ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
