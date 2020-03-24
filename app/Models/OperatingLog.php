<?php

namespace App\Models;

use App\Models\Traits\GetPublicData;
use Illuminate\Database\Eloquent\Model;

class OperatingLog extends Model
{
    use GetPublicData;

    /**
     * 定义表格
     * @var string
     */
    protected $table    = 'operating_logs';

    /**
     * 设计可填充的字段
     * @var array
     */
    protected $fillable = ['user_id', 'uri', 'methods', 'data'];

}
