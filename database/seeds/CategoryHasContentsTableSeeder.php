<?php

use Carbon\Carbon;
use App\Models\Content;
use App\Models\Category;
use App\Models\CategoryHasContent;
use Illuminate\Database\Seeder;

class CategoryHasContentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $content_ids  = Content::all()->pluck('id')->toArray();            #获取文章数据
        $category_ids = Category::all()->pluck('id')->toArray();           #获取分类

        collect($content_ids)->each(
            function ($content_id, $index) use ($category_ids) {
                $category_id = $category_ids[array_rand($category_ids)];
                CategoryHasContent::create(['category_id' => $category_id, 'content_id' => $content_id]);
            }
        );
    }
}
