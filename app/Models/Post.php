<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\MyUuid;
use Illuminate\Database\Eloquent\SoftDeletes;


class Post extends Model
{
    use HasFactory, MyUuid;
    protected $primaryKey = 'uuid';
    use SoftDeletes;
    protected $dates = ['deleted_at'];

}