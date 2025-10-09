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
        // This migration is no longer needed as the username is added in the create_users_table migration
        // and the email column has been removed.
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // This migration is no longer needed as the username is added in the create_users_table migration
        // and the email column has been removed.
    }
};
