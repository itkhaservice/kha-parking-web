<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Roles
        $roles = [
            ['name' => 'IT Admin', 'slug' => 'it', 'description' => 'System Administrator'],
            ['name' => 'Manager', 'slug' => 'manager', 'description' => 'Parking Manager'],
            ['name' => 'Accountant', 'slug' => 'accountant', 'description' => 'Financial Accountant'],
            ['name' => 'Guard', 'slug' => 'guard', 'description' => 'Gate Operator'],
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate(['slug' => $role['slug']], $role);
        }

        // Create IT Admin User
        $itRole = Role::where('slug', 'it')->first();
        User::firstOrCreate(
            ['email' => 'ITKHA'],
            [
                'name' => 'ITKHA',
                'password' => Hash::make('0310341786'),
                'role_id' => $itRole->id,
            ]
        );

        // Create Default Pricing Rules
        \App\Models\PricingRule::firstOrCreate(
            ['vehicle_type' => 'motorcycle'],
            [
                'price_per_hour' => 2000,
                'price_overnight' => 5000,
                'free_minutes' => 15,
                'description' => 'Tiêu chuẩn xe máy'
            ]
        );

        \App\Models\PricingRule::firstOrCreate(
            ['vehicle_type' => 'car'],
            [
                'price_per_hour' => 10000,
                'price_overnight' => 50000,
                'free_minutes' => 10,
                'description' => 'Tiêu chuẩn ô tô'
            ]
        );

        // Create a default gate
        \App\Models\Gate::firstOrCreate(
            ['name' => 'Cổng Chính'],
            [
                'type' => 'both',
                'status' => 'active'
            ]
        );
    }
}
