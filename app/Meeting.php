<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    // 指定表明
    protected $table="meeting";
    // 指定主键id
    protected $primarKey="m_id";
    // 关闭时间chuo1
    public $timestamps = false;
    // 黑名单
    protected $guarded = [];
}
