<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UploadRecord extends Model
{
    /**
     * 定义表格
     * @var string
     */
    protected $table    = 'upload_records';

    /**
     * 设计可填充的字段
     * @var array
     */
    protected $fillable = ['md5', 'path', 'size'];
}
