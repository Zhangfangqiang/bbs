<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\GetPublicData;

class Notification extends Model
{
    use GetPublicData;

    /**
     * 强制数据转换 , 选择字段 然后转换类型 array object json ...
     * @var array
     */
    protected $casts = [
        'data' => 'array',
    ];

    /**
     * 定义表格
     * @var string
     */
    protected $table = 'notifications';
}
