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
            CREATE VIEW vpengajupenulis AS SELECT
            `user`.`id` AS `id`,
            `user`.`nama` AS `nama`,
            `user`.`username` AS `username`,
            `user`.`password` AS `password`,
            `user`.`role` AS `role`,
            `user`.`pengajuan_penulis` AS `pengajuan_penulis`,
            `user`.`created_at` AS `created_at`,
            `user`.`updated_at` AS `updated_at`
FROM
            `user`
WHERE
            `user`.`pengajuan_penulis` = 1
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

    }
};
