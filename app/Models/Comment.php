<?php

namespace App\Models;

use App\Traits\MyUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory, SoftDeletes, MyUuid;
    protected $primaryKey = 'uuid';
    protected $dates = ['deleted_at'];
}
