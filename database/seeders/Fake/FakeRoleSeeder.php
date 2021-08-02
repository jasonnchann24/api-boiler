<?php

namespace Database\Seeders\Fake;

use App\Models\Role;
use Illuminate\Database\Seeder;

class FakeRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'Super Admin',
                'slug' => 'superadmin'
            ],
            [
                'name' => 'Admin',
                'slug' => 'admin'
            ],
            [
                'name' => 'Employee',
                'slug' => 'employee'
            ],
            [
                'name' => 'Tenant',
                'slug' => 'tenant'
            ]
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
