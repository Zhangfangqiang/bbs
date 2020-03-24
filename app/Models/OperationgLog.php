<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class OperationgLog
 * @package App\Models
 * @version March 24, 2020, 11:25 pm CST
 *
 * @property \App\Models\User user
 * @property integer user_id
 * @property string uri
 * @property string methods
 * @property string data
 */
class OperationgLog extends Model
{
    use SoftDeletes;

    public $table = 'operating_logs';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'uri',
        'methods',
        'data'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'uri' => 'string',
        'methods' => 'string',
        'data' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'uri' => 'required',
        'methods' => 'required',
        'data' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }
}
