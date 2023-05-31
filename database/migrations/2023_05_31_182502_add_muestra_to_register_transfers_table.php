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
        Schema::table('register_transfers', function (Blueprint $table) {
            $table->string('muestra')->after('cantidad')->nullable();
            $table->string('pharmacy')->after('muestra')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('register_transfers', function (Blueprint $table) {
            //
        });
    }
};