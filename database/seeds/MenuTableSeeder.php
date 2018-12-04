<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('menus')->insert([
            'name' => 'events',
            'path' => '/events',
            'route_name' => 'events',
            'icon' => 'glyphicon glyphicon-pencil',
            'description' => 'Manage events',
        ]);

        DB::table('menus')->insert([
            'name' => 'categories',
            'path' => '/categories',
            'route_name' => 'categories',
            'icon' => 'glyphicon glyphicon-pencil',
            'description' => 'Manage categories',
        ]);

        DB::table('menus')->insert([
            'name' => 'eventshops',
            'path' => '/eventshops',
            'route_name' => 'eventshops',
            'icon' => 'glyphicon glyphicon-pencil',
            'description' => 'Manage eventshops',
        ]);

        DB::table('menus')->insert([
            'name' => 'productevents',
            'path' => '/productevents',
            'route_name' => 'productevents',
            'icon' => 'glyphicon glyphicon-pencil',
            'description' => 'Manage productevents',
        ]);

        DB::table('menus')->insert([
            'name' => 'products',
            'path' => '/products',
            'route_name' => 'products',
            'icon' => 'glyphicon glyphicon-pencil',
            'description' => 'Manage products',
        ]);

        DB::table('menus')->insert([
            'name' => 'shops',
            'path' => '/shops',
            'route_name' => 'shops',
            'icon' => 'glyphicon glyphicon-pencil',
            'description' => 'Manage shops',
        ]);

        DB::table('menus')->insert([
            'name' => 'locations',
            'path' => '/locations',
            'route_name' => 'locations',
            'icon' => 'glyphicon glyphicon-pencil',
            'description' => 'Manage locations',
        ]);
    }
}
