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
        DB::statement("ALTER TABLE `internship_requests` ADD `assign_to` VARCHAR(111) NULL DEFAULT NULL AFTER `user_id`, ADD `checked_by` VARCHAR(111) NULL DEFAULT NULL AFTER `assign_to`;");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('request', function (Blueprint $table) {
            //
        });
    }
};
