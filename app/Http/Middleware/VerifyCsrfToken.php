<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
        '/',
        'Salir',
        'Editar-Noticia-Multimedia',
        'Crear-Noticias',
        'Buscar-Noticias',
        'Editar-Noticia',
        'Editar-Noticia-Multimedia4',
        'Editar-Noticia-Multimedia2',
        'Editar-Noticia-Multimedia3',
        'Editar-Noticia-Etiquetas',
        'Eliminar-Noticia',
        'Crear-Cuenta',
        'Buscar-Cuenta',
        'Editar-Cuenta',
        'Editar-Imagen',
        'Eliminar-Cuenta',
        'Eliminar-Imagen',
        'Crear-Autor',
        'Buscar-Autor',
        'Editar-Autor',
        'Editar-Imagen-Autor',
        'Eliminar-Cuenta-Autor',
        'Eliminar-Imagen-Autor',
        'Crear-Post',
        'Buscar-Post',
        'Editar-Post',
        'Editar-Post-Multimedia4',
        'Editar-Post-Multimedia',
        'Editar-Post-Multimedia2',
        'Editar-Post-Multimedia3',
        'Editar-Post-Etiquetas',
        'Eliminar-Post' ,
        'Crear-Tutorial',
        'Buscar-Tutorial',
        'Editar-Tutorial',
        'Editar-Tutorial-Youtube',
        'Eliminar-Tutorial',
        'Recuperar-Clave',
    ];
}
