<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->date('publication_year')->default(null)->change();
        });
    }
    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->unsignedSmallInteger('publication_year')->change();
        });
    }
};
