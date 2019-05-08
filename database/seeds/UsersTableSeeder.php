<?php

use App\Admin;
use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
        	'name' 		=> 'User',
        	'email' 	=> 'user@user.com',
        	'password' 	=> bcrypt(123456),
        	'address' 	=> 'mohamed address goes here!',
        	'mobile' 	=> '01026687240',
        	'type'		=> 'user'
        ]);

        $doctor = User::create([
        	'name' 		=> 'Doctor',
        	'email' 	=> 'doctor@user.com',
        	'password' 	=> bcrypt(123456),
        	'address' 	=> 'doctor address goes here!',
        	'mobile' 	=> '01026687240',
        	'type'		=> 'doctor'
        ]);

        $super = Admin::create([
            'name'      => 'Super Admin',
            'email'     => 'super@admin.com',
            'password'  => bcrypt(123456),
            'type' 		=> 'super'
        ]);

        $normal = Admin::create([
            'name'      => 'Normal Admin',
            'email'     => 'normal@admin.com',
            'password'  => bcrypt(123456),
            'type' 		=> 'normal'
        ]);
        # Create Roles
        $superRole 	= Role::create(['name' => 'Super Admin', 'guard_name' => 'admin']);
        $normalRole = Role::create(['name' => 'Normal Admin', 'guard_name' => 'admin']);
        $doctorRole = Role::create(['name' => 'Doctor']);
        $userRole 	= Role::create(['name' => 'Secretary']);
        # Create Permissions
        Permission::create(['name' => 'User Add', 'guard_name' => 'admin']);
        Permission::create(['name' => 'User Edit', 'guard_name' => 'admin']);
        Permission::create(['name' => 'User Delete', 'guard_name' => 'admin']);
        Permission::create(['name' => 'User Show', 'guard_name' => 'admin']);
        Permission::create(['name' => 'User Add']);
        Permission::create(['name' => 'User Edit']);
        Permission::create(['name' => 'User Delete']);
        Permission::create(['name' => 'User Show']);
        # Assing Roles To Users
        $super->assignRole('Super Admin');
        $normal->assignRole('Normal Admin');
        $doctor->assignRole('Doctor');
        $user->assignRole('Secretary');
        # Add Permissions To Super Admin
        $super->givePermissionTo('User Add');
        $super->givePermissionTo('User Edit');
        $super->givePermissionTo('User Delete');
        $super->givePermissionTo('User Show');
        # Add Permissions To Normal Admin
        $normal->givePermissionTo('User Add');
        $normal->givePermissionTo('User Show');

        # Add Permissions To Super Admin Role
        $superRole->givePermissionTo('User Add');
        $superRole->givePermissionTo('User Edit');
        $superRole->givePermissionTo('User Delete');
        $super->givePermissionTo('User Show');
        # Add Permissions To Normal Admin Role
        $normalRole->givePermissionTo('User Add');
        $normalRole->givePermissionTo('User Show');
    }
}
