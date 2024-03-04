<?php

namespace Database\Seeders;

use App\Models\permission;
use App\Models\role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class adminseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $admin=role::query()->firstOrCreate([
        'name' =>'admin'
       ]);

    //    $permissions=permission::all();
    //    $admin->permissions()->attach($permissions);

    $permissions= new permission();
    $permissions->create=1;
    $permissions->read=1;
    $permissions->edit=1;
    $permissions->delete=1;
    $permissions->role_id=$admin->id;
    $permissions->save();

       User::query()->create([
        'name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('admin1234'),
            'tel' => '01234567890',
            'role_id'=> $admin->id
       ]);


    }
}
