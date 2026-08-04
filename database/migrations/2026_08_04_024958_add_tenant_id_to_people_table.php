<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('people', function (Blueprint $table) {

            $table->foreignId('tenant_id')
                ->nullable()
                ->after('id')
                ->constrained()
                ->cascadeOnDelete();

        });

        /*
        |--------------------------------------------------------------------------
        | Existing records belong to the default tenant
        |--------------------------------------------------------------------------
        */

        DB::table('people')->update([
            'tenant_id' => 1,
        ]);

        Schema::table('people', function (Blueprint $table) {

            $table->foreignId('tenant_id')
                ->nullable(false)
                ->change();

        });
    }

    public function down(): void
    {
        Schema::table('people', function (Blueprint $table) {

            $table->dropConstrainedForeignId('tenant_id');

        });
    }
};
