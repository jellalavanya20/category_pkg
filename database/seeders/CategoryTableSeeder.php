<?php

namespace Indianic\Category\Seeders;

use Illuminate\Database\Seeder;
class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('categories')->insert(
            array(
                array('id' => '1','text' => 'Parent','parent_id' => null,'status' => 'Active'),
            )
        );
    }
}
