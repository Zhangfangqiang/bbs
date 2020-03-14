<?php

namespace App\Http\Controllers\Web;

use App\Services\CategoryService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\CategoriesRequest;

class CategoriesController extends Controller
{
    /**
     * 弹出分类选项开始
     * @param CategoryService $categoryService
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function popupList(CategoriesRequest $request, CategoryService $categoryService)
    {
        $categories = $categoryService->getCategoryData();
        $ids        = explode(',', $request->input('ids'));

        return view('web.categories.popup_list', compact('categories','ids'));
    }
}
