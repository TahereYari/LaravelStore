<?php

namespace Database\Seeders;

use App\Models\role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class userroleseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $role= new role();
       $role->name ='user';
       $role->save();
    }
}
