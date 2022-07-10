<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use SIGA\Acl\Helpers\LoadRouterHelper;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LoadRouterHelper::save();
    }
}
