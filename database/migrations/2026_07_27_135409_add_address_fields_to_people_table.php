<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('people', function (Blueprint $table) {

            $table->string('zip_code', 9)->nullable()->after('phone');

            $table->string('street')->nullable()->after('zip_code');

            $table->string('number', 20)->nullable()->after('street');

            $table->string('complement')->nullable()->after('number');

            $table->string('neighborhood')->nullable()->after('complement');

            $table->string('city')->nullable()->after('neighborhood');

            $table->string('state', 2)->nullable()->after('city');

        });
    }

    public function down(): void
    {
        Schema::table('people', function (Blueprint $table) {

            $table->dropColumn([
                'zip_code',
                'street',
                'number',
                'complement',
                'neighborhood',
                'city',
                'state',
            ]);

        });
    }
};
