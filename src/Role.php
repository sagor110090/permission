<?php

namespace Sagor110090\Permission;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    
    protected $table = 'roles';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';


    protected $fillable = ['name', 'permission'];

    
}
