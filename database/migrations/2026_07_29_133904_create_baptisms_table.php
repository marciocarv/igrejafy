<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('baptisms', function (Blueprint $table) {

            $table->id();

            $table->foreignId('person_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->date('baptism_date');

            $table->string('church_name');

            $table->string('pastor_name')
                ->nullable();

            $table->string('city')
                ->nullable();

            $table->string('state', 2)
                ->nullable();

            $table->string('certificate_book')
                ->nullable();

            $table->string('certificate_page')
                ->nullable();

            $table->string('certificate_number')
                ->nullable();

            $table->text('notes')
                ->nullable();

            $table->timestamps();

            $table->softDeletes();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('baptisms');
    }
};
