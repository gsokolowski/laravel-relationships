<?php

//
// One article belongs to One user
//
// belongsTo()
// returns collection
//
// access like {{ $article->poster->name }}
//

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    // In class Article,
    // a poster (a user who posted article) belongsTo model \App\User
    // and foreign key in Article is user_id
    // which corresponds to id in User model
    // at the same time in class User, a user can have many articles hasMany()
    // Article belongs to User through poster method
    public function poster() {

        return $this->belongsTo('\App\User', 'user_id', 'id');
        // and this is how you access user name
        // {{ $article->poster->name }} // through dynamic property poster
    }



    // Other option to get users per article is to make a query
    // but you should use relations not queries to do this
    public function getPosterName(){

        // one way to do relations on query
        return User::where('id', $this->user_id)->first()->name;

    }

    public function comments() {

        // Comment - model name
        // commentable is name of method in Comment model commentable()
        // commentable_type is table comments needs to have App\Article

        return $this->morphMany('\App\Comment', 'commentable');
    }

}
