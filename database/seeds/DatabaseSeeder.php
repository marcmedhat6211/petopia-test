<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin_menu')->insert([
            'parent_id' => 0,
            'order' => 0,
            'title' => 'Posts',
            'icon'	=> 'fa-bars',
            'uri'	=>  'http://localhost:8000/admin/posts',
            'permission' => null,
            'created_at' => null,
            'updated_at' => null
        ]);

        DB::table('admin_menu')->insert([
            'parent_id' => 0,
            'order' => 0,
            'title' => 'Comments',
            'icon'	=> 'fa-bars',
            'uri'	=>  'http://localhost:8000/admin/comments',
            'permission' => null,
            'created_at' => null,
            'updated_at' => null
        ]);
    }
}
