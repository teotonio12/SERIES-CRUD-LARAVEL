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
        return $this->getKeyName();
    }

    public function getAuthPassword(){
        return $this->password;
    }

    public function getAuthIdentifier(){
        return $this->{$this->getAuthIdentifierName()};
    }

    public function getRememberToken(){
        if (! empty($this->getRememberTokenName())) {
            return (string) $this->{$this->getRememberTokenName()};
        }
    }

    public function setRememberToken($value){
        if (! empty($this->getRememberTokenName())) {
            $this->{$this->getRememberTokenName()} = $value;
        }
    }

    public function getRememberTokenName(){
        return $this->rememberTokenName;
    }

}