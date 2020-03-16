<?php

namespace App\Http\Controllers\Web;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\CategoriesRequest;

class CategoriesController extends Controller
{
    /**
     * 弹出分类选项开始
     */
    public function popupList(CategoriesRequest $request ,Category $category)
    {
        $categories = $category->getData();
        $ids        = explode(',', $request->input('ids'));

        return view('web.categories.popup_list', compact('categories','ids'));
    }
}
