{!! Form::open(['route' => 'editarMu2Noticia', 'id' => 'imagen-form', '', 'enctype'=>'multipart/form-data', 'class' => 'form-horizontal ', 'data-success' => 'Se ha editado el contenido multimedia con éxito','data-toastr-position' => 'top-right', 'onsubmit' => 'location.reload()']) !!} 

{!! Form::input('hidden', 'id', $noticia->idpost, ['id' => 'id', 'class'=> 'form-control required','maxlength'=> '10', 'readonly' ]) !!}  

<fieldset>

	{!! Form::input('hidden', 'str_tipo', $noticia->str_tipo, ['id' => 'str_tipo', 'class'=> 'form-control ','maxlength'=> '10', 'readonly' ]) !!}  

	<div class="form-group">
		<label class="col-md-3 control-label" for="name">Imágen del Post N° 1</label>
		<div class="col-md-8">

			{!! Form::file('blb_img1',['id' => 'blb_img1','data-btn-text' =>'Buscar Foto', 'class' => 'custom-file-upload required']) !!}
			<small class="text-muted block">Tamaño máximo: 1Mb (jpg/png) Medidas 1200 x 500</small>

		</div>
	</div>

	<div class="form-group">
		<label class="col-md-3 control-label" for="name">Imágen del Post N° 2</label>
		<div class="col-md-8">

			{!! Form::file('blb_img2',['id' => 'blb_img2','data-btn-text' =>'Buscar Foto', 'class' => 'custom-file-upload required']) !!}
			<small class="text-muted block">Tamaño máximo: 1Mb (jpg/png) Medidas 1200 x 500</small>

		</div>
	</div>

	<div class="form-group">
		<label class="col-md-3 control-label" for="name">Imágen del Post N° 3</label>
		<div class="col-md-8">

			{!! Form::file('blb_img3',['id' => 'blb_img3','data-btn-text' =>'Buscar Foto', 'class' => 'custom-file-upload required']) !!}
			<small class="text-muted block">Tamaño máximo: 1Mb (jpg/png) Medidas 1200 x 500</small>

		</div>
	</div>		

</fieldset>

<div class="row">
	<div class="col-md-12">

		{!! Form::submit('CAMBIAR MULTIMEDIA', ['class' => 'btn btn-3d btn-teal btn-xlg btn-block margin-top-30']) !!}
		
	</div>
</div>

{!! Form::close() !!}