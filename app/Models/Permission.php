<?php

namespace App\Models;

use App\Models\Traits\GetPublicData;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{

    use GetPublicData;

    /**
     * 表格
     */
    public $table = 'permissions';


    /**
     * 可填充字段
     */
    public $fillable = [
        'name',
        'guard_name'
    ];
}
