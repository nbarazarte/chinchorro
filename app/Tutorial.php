<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class Tutorial extends Model
{

/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tbl_tutorial';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['lng_idadmin','str_estatus','str_titulo','str_post','str_video','bol_eliminado'];
}