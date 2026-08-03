<?php

namespace Database\Seeders;

use App\Models\Tenant;
use Illuminate\Database\Seeder;

class TenantSeeder extends Seeder
{
    public function run(): void
    {
        Tenant::firstOrCreate(
            ['slug' => 'igreja-local'],
            [
                'name' => 'Igreja Local',
                'legal_name' => 'Igreja Local',
                'subscription_status' => 'lifetime',
                'is_active' => true,
            ]
        );
    }
}
