<?php

use Illuminate\Database\Seeder;
class PovitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_post')->delete();

        DB::table('category_post')->insert(array(
            array('category_id' => 1, 'post_id' => 5),
            array('category_id' => 2, 'post_id' => 4),
            array('category_id' => 3, 'post_id' => 3),
            array('category_id' => 4, 'post_id' => 2),
            array('category_id' => 5, 'post_id' => 1)
        ));


        DB::table('post_tag')->delete();

        DB::table('post_tag')->insert(array(
            array('tag_id' => 1, 'post_id' => 5),
            array('tag_id' => 2, 'post_id' => 4),
            array('tag_id' => 3, 'post_id' => 3),
            array('tag_id' => 4, 'post_id' => 2),
            array('tag_id' => 5, 'post_id' => 1)
        ));


    }
}
