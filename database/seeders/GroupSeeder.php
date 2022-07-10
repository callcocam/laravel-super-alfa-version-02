<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Group::factory(1)->create([
            'name'=>'index',
            'slug'=>'index',
            'status'=>'published',
        ]);
        Group::factory(1)->create([
            'name'=>'create',
            'slug'=>'create',
            'status'=>'published',
        ]);
        Group::factory(1)->create([
            'name'=>'edit',
            'slug'=>'edit',
            'status'=>'published',
        ]);
        Group::factory(1)->create([
            'name'=>'destroy',
            'slug'=>'destroy',
            'status'=>'published',
        ]);
    }
}
