<?php

use fooCart\Core\Models\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
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
                'name' => 'guest'
            ],
            [
                'name' => 'registered'
            ],
            [
                'name' => 'admin'
            ]
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
