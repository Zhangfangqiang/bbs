<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryHasContent extends Model
{
    /**
     * 定义表格
     * @var string
     */
    protected $table    = 'category_has_contents';

    /**
     * 设计可填充的字段
     * @var array
     */
    protected $fillable = ['category_id', 'content_id'];
}
