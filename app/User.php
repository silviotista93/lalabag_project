<?php

namespace App;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','apellidos','email','telefono','foto' ,'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setNameAttribute($valor){
        $this->attributes['name'] = strtolower($valor);
    }

    public function getNameAttribute($valor){
        return ucwords($valor);
    }

    public function setApellidosAttribute($valor){
        $this->attributes['apellidos'] = strtolower($valor);
    }

    public function getApellidosAttribute($valor){
        return ucwords($valor);
    }

    public function clientes(){
        return $this->hasOne(Cliente::class,'user_id');
    }
}
