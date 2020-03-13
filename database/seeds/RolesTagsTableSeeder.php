<?php

use Illuminate\Database\Seeder;

class RolesTagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesPermissionsTableSeeder::class);
        $this->call(TagsTableSeeder::class);
    }
}
