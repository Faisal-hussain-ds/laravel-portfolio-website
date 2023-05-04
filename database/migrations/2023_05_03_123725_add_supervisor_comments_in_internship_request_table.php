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
        DB::statement("ALTER TABLE `internship_requests` ADD `supervisor_comments` TEXT NULL AFTER `comments`;");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('internship_request', function (Blueprint $table) {
            //
        });
    }
};
