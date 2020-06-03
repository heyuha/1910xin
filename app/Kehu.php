<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kehu extends Model
{
    //// 指定表明
    protected $table="kehu";
    // 指定主键id
    protected $primarKey="k_id";
    // 关闭时间chuo1
    public $timestamps = false;
    // 黑名单
    protected $guarded = [];
}
