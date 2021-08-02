<?php

namespace Database\Seeders\Fake;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class FakeUserPinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();

        foreach ($users as $user) {
            if (random_int(0, 1) || $user->role->slug == 'superadmin' || $user->role->slug == 'admin') {
                $user->userPin()->create([
                    'pin' => '123123'
                ]);
            }
        }
    }
}
