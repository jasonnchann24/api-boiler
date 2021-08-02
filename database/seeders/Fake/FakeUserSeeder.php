<?php

namespace Database\Seeders\Fake;

use App\Models\Role;
use Illuminate\Database\Seeder;

class FakeUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = Role::all();

        \App\Models\User::factory(1)->create(
            [
                'name' => 'Superadmin',
                'role_id' => $roles->where('slug', 'superadmin')->first()->id,
                'email' => config('app.superadmin_mail'),
                'email_verified_at' => null,
            ]
        );

        \App\Models\User::factory(1)->create(
            [
                'name' => 'Admin',
                'role_id' => $roles->where('slug', 'admin')->first()->id,
                'email_verified_at' => null,
            ]
        );

        for ($i = 0; $i < 10; $i++) {
            \App\Models\User::factory([
                'role_id' => $roles->whereNotIn('slug', ['superadmin', 'admin'])->random(1)->first()->id
            ])->create();
        }
    }
}
