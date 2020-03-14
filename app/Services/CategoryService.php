<?php

namespace App\Services;

use App\Models\Category;

class CategoryService
{
    /**
     * 返回CategoryData 数据
     * @param $configArray
     */
    public function getCategoryData($configArray = null)
    {
        $categoryData = Category::with('children', 'content')
                        ->select(\DB::raw(" * , concat(path,',',id) AS paths"))
                        ->orderBy('paths');

        if (isset($configArray['otherWhere']) && !empty($configArray['otherWhere'])) {
            foreach ($configArray['otherWhere'] as $snap) {
                $categoryData = $categoryData->where($snap[0], $snap[1], $snap[2]);
            }
        }

        if (isset($configArray['otherWhereIn']) && !empty($configArray['otherWhereIn'])) {
            foreach ($configArray['otherWhereIn'] as $snap) {
                $categoryData = $categoryData->whereIn($snap[0], explode(' ', $snap[1]));
            }
        }

        if (isset($configArray['paginate']) && !empty($configArray['paginate'])) {
            $categoryData = $categoryData->paginate($configArray['paginate']);
        } else {
            $categoryData = $categoryData->get();
        }

        return $categoryData;
    }

}
