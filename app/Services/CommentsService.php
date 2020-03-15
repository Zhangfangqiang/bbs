<?php

namespace App\Services;

use App\Models\Comment;

class CommentsService
{
    /**
     * 学习了
     * 这是一个递归获取目录树的方法
     * @param null $parentId 参数代表要获取子类目的父类目 ID，null 代表获取所有根类目
     * @param null $allCategories 参数代表数据库中所有的类目，如果是 null 代表需要从数据库中查询
     * @return Category[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection
     */
    public function getCommentDate($configArray)
    {
        $commentData = Comment::with('children', 'user')
            ->select(\DB::raw(" * , concat(path,',',id) AS paths"))
            ->where('status', '=', '1');

        if (isset($configArray['model']) && !empty($configArray['model'])) {
            $commentData->where('model_type', '=', get_class($configArray['model']))->where('model_id', '=', $configArray['model']->id);
        }

        if (isset($configArray['otherWhere']) && !empty($configArray['otherWhere'])) {
            foreach ($configArray['otherWhere'] as $snap) {
                $commentData = $commentData->where($snap[0], $snap[1], $snap[2]);
            }
        }
        if (isset($configArray['order']) && !empty($configArray['order'])) {
            $commentData = $commentData->orderBy($configArray['order'][0], $configArray['order'][1]);
        } else {
            $commentData = $commentData->orderBy('paths');
        }

        if (isset($configArray['limit']) && !empty($configArray['limit']) && isset($configArray['offset'])) {
            $commentData = $commentData->offset($configArray['offset'])->limit($configArray['limit']);
        }

        if (isset($configArray['paginate']) && !empty($configArray['paginate'])) {
            $commentData = $commentData->paginate($configArray['paginate']);
        } else {
            $commentData = $commentData->get();
        }

        return $commentData;
    }
}
