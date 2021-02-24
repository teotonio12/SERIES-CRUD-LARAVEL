<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable
{
    protected $primaryKey = 'id';

    protected $fillable = ['nome','email', 'password'];

    public $timestamps = false;

    public function getAuthIdentifierName(){
        
    }

    public function getAuthPassword(){
        
    }

    public function getAuthIdentifier(){
        
    }

    public function getRememberToken(){
        
    }

    public function setRememberToken($token){
        
    }

    public function getRememberTokenName(){
        
    }

}