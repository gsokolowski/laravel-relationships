<?php

//
// One user has many articles
//
// hasMany()
// returns collection
//
// access like that {{ $user->articles[0]->title }}
//
//
//
// hasOne()
// returns one object
// access it like that {{$user->address->country}}
//
//


namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    // In class User,
    // a user who posted article hasMany articles
    // where articles.user_id corresponds to user.id
    // articles() will return collection of articles from that User
    public function articles() {

        // returns collection so you access it in view as
        // {{ $user->articles[0]->title }}
        return $this->hasMany('\App\Article', 'user_id', 'id');
    }


    // One User has one address
    // through foreign key addresses.user_id
    public function address() {

        return $this->hasOne('\App\Address', 'user_id', 'id');
    }


    // this is many to many relation users - roles on user_role pivot table
    public function roles() {

        return $this->belongsToMany('\App\Role', 'role_user', 'user_id', 'role_id');
        // user_role - name of pivot table
        // user_id - local key
        // role_id - foreign key
    }

    public function comments() {

        // Comment - model name
        // commentable is name of method in Comment model commentable()
        // commentable_type is table comments needs to have App\User

        return $this->morphMany('\App\Comment', 'commentable');
    }
}
