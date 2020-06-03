<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Yewu extends Model
{
    // // 指定表明
    protected $table="yewu";
    // 指定主键id
    protected $primarKey="y_id";
    // 关闭时间chuo1
    public $timestamps = false;
    // 黑名单
    protected $guarded = [];
}
