{!! Form::open(['route' => 'editarTutorialMultimedia', 'id' => 'imagen-form', '', 'enctype'=>'multipart/form-data', 'class' => 'form-horizontal ', 'data-success' => 'Se ha cambiado la imágen de perfil con éxito','data-toastr-position' => 'top-right', 'onsubmit' => 'location.reload()']) !!} 
{!! csrf_field() !!}
{!! Form::input('hidden', 'id', $tutorial->idpost, ['id' => 'id', 'class'=> 'form-control required','maxlength'=> '10', 'readonly' ]) !!}  
<fieldset>

<textarea id="str_video" name="str_video" class="form-control required" placeholder="Ejemplo: <iframe class=embed-responsive-item width=560 height=315 src=http://www.youtube.com/embed/W7Las-MJnJo></iframe>" rows="4" cols="350"></textarea><span class="tooltip tooltip-top-right">Ingrese el link de video</span>

</fieldset>

<div class="row">
	<div class="col-md-12">

		{!! Form::submit('CAMBIAR MULTIMEDIA', ['class' => 'btn btn-3d btn-teal btn-xlg btn-block margin-top-30']) !!}
		
	</div>
</div>

{!! Form::close() !!}