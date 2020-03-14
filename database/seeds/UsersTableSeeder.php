<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = app(Faker\Generator::class);       #获取 Faker(伪造者) 实例

        #头像假数据
        $avatars = [
            'https://cdn.learnku.com/uploads/images/201710/14/1/s5ehp11z6s.png',
            'https://cdn.learnku.com/uploads/images/201710/14/1/Lhd1SHqu86.png',
            'https://cdn.learnku.com/uploads/images/201710/14/1/LOnMrqbHJn.png',
            'https://cdn.learnku.com/uploads/images/201710/14/1/xAuDMxteQy.png',
            'https://cdn.learnku.com/uploads/images/201710/14/1/ZqM7iaP4CR.png',
            'https://cdn.learnku.com/uploads/images/201710/14/1/NDnzMutoxX.png',
        ];

        #生成数据集合 工厂设计模式
        $users = factory(User::class)->times(10)->make()->each(
            function ($user, $index) use ($faker, $avatars) {
                #从头像数组中随机取出一个并赋值
                $user->avatar = $faker->randomElement($avatars);
            }
        );

        /**
         * 让隐藏字段可见，并将数据集合转换为数组,是 Eloquent 对象提供的方法，可以显示
         * User 模型 $hidden 属性里指定隐藏的字段，此操作确保入库时数据库不会报错
         */
        $user_array = $users->makeVisible(['password', 'remember_token'])->toArray();
        User::insert($user_array);
    }
}
