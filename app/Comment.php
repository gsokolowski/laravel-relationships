<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // this ethode needs to be called just like
    // commentable_id and commentable_type to be able to work
    // in commentable_type you need to have model name
    // User for comments under user
    // Article for comments under article

    public function commentable() {

        return $this->morphTo();
    }
}
