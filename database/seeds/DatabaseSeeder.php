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
        $this->call(UsersTableSeeder::class);               #创建用户
        $this->call(CategoriesTableSeeder::class);          #创建分类
        $this->call(ContentsTableSeeder::class);            #创建内容
        $this->call(CategoryHasContentsTableSeeder::class); #关联内容
    }
}
