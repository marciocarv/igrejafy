<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('people', function (Blueprint $table) {

            $table->id();

            $table->enum('person_type', [
                'visitor',
                'congregant',
                'member'
            ]);

            $table->string('first_name', 100);

            $table->string('last_name', 100);

            $table->enum('gender', [
                'male',
                'female'
            ]);

            $table->date('birth_date')->nullable();

            $table->string('email')->nullable()->unique();

            $table->string('phone', 30)->nullable();

            $table->boolean('active')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('people');
    }
};
