<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriasNoticias extends Model
{
/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tbl_categorias_noticias';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['lng_idnoticias', 'str_categoria', 'bol_eliminado'];


}