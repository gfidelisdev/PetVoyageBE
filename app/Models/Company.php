<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\MyUuid;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory, MyUuid, SoftDeletes;
    protected $primaryKey = 'uuid';
    protected $dates = ['deleted_at'];

}