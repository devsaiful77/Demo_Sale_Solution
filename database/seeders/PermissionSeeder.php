<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        //data for permissions table
        $data = [
            //For Role System...
            ['name' => 'role-access' ],
            ['name' => 'role-list'],
            ['name' => 'role-create'],
            ['name' => 'role-show'],
            ['name' => 'role-edit'],
            ['name' => 'role-delete'],

            //For User System...
            ['name' => 'user-access'],
            ['name' => 'user-list'],
            ['name' => 'user-create'],
            ['name' => 'user-show'],
            ['name' => 'user-edit'],
            ['name' => 'user-delete']

        ];
        Permission::insert($data);

        //Data for role user pivot
        $dev = User::where('email', 'admin@gmail.com')->first();
        $data = [
            ['role_id' => 1, 'model_type' => 'App\Models\User', 'model_id' => $dev->id]
        ];

        DB::table('model_has_roles')->insert($data);





        //Data for role permission pivot
        $permissions = Permission::all();
        foreach ($permissions as $key => $value) {
            $data = [
                ['permission_id' => $value->id, 'role_id' => 1],
            ];

            DB::table('role_has_permissions')->insert($data);
        }



    }
}
