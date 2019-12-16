<?php

namespace App;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    protected $table="users";

    protected $fillable = [
        'email',
        'password',
        'name'
    ];

    protected $hidden=[

        'password',

        'created_at',

        'updated_at'

    ];

}
