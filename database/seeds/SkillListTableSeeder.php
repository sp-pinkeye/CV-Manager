<?php

use Illuminate\Database\Seeder;

class SkillListTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('skill_list')->insert([
        ['name' => 'PHP','version'=>'5.6'],
        ['name' => 'MySQL','version'=>'5.5'],
        ['name' => 'Javascript','version'=>null],
        ['name' => 'jQuery','version'=>null],
        ['name' => 'Laravel','version'=>'5.2'],
        ['name' => 'Joomla','version'=>'3.5'],
        ['name' => 'C','version'=>null],
        ['name' => 'C++','version'=>null],
        ['name' => 'HTML','version'=>'5.0'],
        ['name' => 'CSS','version'=>'3.0'],
        ['name' => 'XML','version'=>null],
        ['name' => 'XSLT','version'=>null],
        ['name' => 'Joomla','version'=>'3.5'],
                ]);
    }
}
