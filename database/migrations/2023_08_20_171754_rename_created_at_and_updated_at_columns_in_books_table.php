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
        Schema::table('books', function (Blueprint $table) {
            $table->renameColumn('created_at', 'creato_il');
            $table->renameColumn('updated_at', 'aggiornato_il');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->renameColumn('creato_il', 'created_at');
            $table->renameColumn('aggiornato_il', 'updated_at');
        });
    }
};
