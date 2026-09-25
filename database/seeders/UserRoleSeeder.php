<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $updates = [
            1  => ['role' => null], // ya jo role ID 1 ka pehle tha
            2  => ['role' => null], // ya jo role ID 2 ka pehle tha
            3  => ['role' => 'b1'],
            4  => ['role' => 'b2'],
            5  => ['role' => 'b3'],
            6  => ['role' => 'b4'],
            7  => ['role' => 'b5'],
            8  => ['role' => 'b6'],
            9  => ['role' => 'a1'],
            10 => ['role' => 'a2'],
            11 => ['role' => 'a3'],
        ];

        foreach ($updates as $id => $data) {
            DB::table('users')->where('id', $id)->update([
                'role'       => $data['role'],
                'created_at' => null,
                'updated_at' => null,
            ]);
    }
}
}