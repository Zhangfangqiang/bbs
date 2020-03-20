<?php

use App\Models\User;
use App\Models\Content;
use App\Models\UserHasContent;
use Illuminate\Database\Seeder;

class UserHasContentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_ids = User::all()->pluck('id')->toArray();                                                                      #获取用户

        for ($i = 0; $i < 10; $i++) {
            Content::all()->each(
                function ($item) use ($user_ids) {
                    $user_id = $user_ids[array_rand($user_ids)];                                                                   #随机获得一个用户
                    if (UserHasContent::where('user_id', '=', $user_id)->where('content_id', '=', $item->id)->count() == 0) {      #如果没有任何关联
                        $item->awesomeUser()->attach($user_id);                                                                    #添加关系
                    }
                }
            );
        }
    }
}
