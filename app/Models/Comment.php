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
    protected $appends = ['replied', 'author_name'];

    public function getRepliedAttribute()
    {
        return $this->hasAnyReply();
    }

    public function getAuthorNameAttribute()
    {
        return $this->_author->name;
    }
    public function _author()
    {
        return $this->belongsTo(User::class, 'author');
    }

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

    public function reply_to()
    {
        return $this->belongsTo(Comment::class, 'reply_to');
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'reply_to');
    }

    public function hasAnyReply()
    {
        return Comment::where('reply_to', $this->uuid)->exists();
    }
}
