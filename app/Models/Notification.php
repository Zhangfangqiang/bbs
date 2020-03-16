<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\GetPublicData;

class Notification extends Model
{
    use GetPublicData;

    /**
     * 定义表格
     * @var string
     */
    protected $table = 'notifications';
}
