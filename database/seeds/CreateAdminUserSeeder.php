<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Farid Alvi',
            'email' => 'faridawan0@gmail.com',
            'password' => bcrypt('12345')
        ]);

        $admin = Role::create(['name' => 'Admin']);
        $mart = Role::create(['name'=>'Mart']);

        $adminPermissions = Permission::pluck('id','id')->all();
        $martPermissions = Permission::whereIn('id',[1,2,3,4,5,6,7,8])->get();

        $admin->syncPermissions($adminPermissions);
        $mart->syncPermissions($martPermissions);

        $user->assignRole([$admin->id]);
    }
}
