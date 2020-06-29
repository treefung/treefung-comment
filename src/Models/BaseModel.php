<?php

namespace Treefung\Comment\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BaseModel extends Model {

    protected $connection = 'mysql_main';

    use SoftDeletes;

    const CREATED_AT = 'createTime';
    const UPDATED_AT = 'updateTime';
    const DELETED_AT = 'deleteTime';

    protected $guarded = [];

    public static $snakeAttributes = false;

    public function getUpdateTimeAttribute($value){

        return $value ? date("Y-m-d H:i:s", strtotime($value)) : '';
    }

    public function getCreateTimeAttribute($value){

        return $value ? date("Y-m-d H:i:s", strtotime($value)) : '';
    }

    public function getDeleteTimeAttribute($value){

        return $value ? date("Y-m-d H:i:s", strtotime($value)) : '';
    }

}
