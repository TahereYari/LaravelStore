<?php

namespace Database\Seeders;

use App\Models\permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class permissionseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      permission::create([
            'add'=>1,
            'preview'=>1,
            'edit'=>1,
            'remove'=>1,
        ]);
    }
}
