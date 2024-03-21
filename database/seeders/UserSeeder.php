<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $user1 = new User();
        $user1->name = "Admin SMA Tanjung Priok";
        $user1->email = "admin.smatanjungpriok@gmail.com";
        $user1->password = bcrypt("adminsmatjpriok");
        $user1->role = 'admin';
        $user1->save();

        $user2 = new User();
        $user2->name = "Osis SMA Tanjung Priok";
        $user2->email = "osis.smatanjungpriok@gmail.com";
        $user2->password = bcrypt("osissmatjpriok");
        $user2->role = 'osis';
        $user2->save();
    }
}
