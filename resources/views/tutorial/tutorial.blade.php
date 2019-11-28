@extends('app')

@section('content')

@include('menu')

	@foreach ($tutoriales as $tutorial)

	@endforeach

		

			<!-- 
				MIDDLE 
			-->
			<section id="middle">

				<!-- page title -->
				<header id="page-header">
					<h1>Ver Tutorial</h1>
					<ol class="breadcrumb">
						<li><a href="{{ route('home')}}">Dashboard</a></li>
						<li><a href="{{ route('buscarTutorial')}}">Buscar Tutorial</a></li>
						<li class="active">Ver Tutorial</li>
					</ol>
				</header>

				<!-- /page title -->

				<div id="content" class="padding-20">

				    @if (Session::has('errors'))

                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                  <ul>
                                    <!-- <strong>Oops! Something went wrong : </strong> -->
                                    <strong>Por favor complete los siguientes campos: </strong>
                                    @foreach ($errors->all() as $error)
                                         <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                        </div>

                    @endif

        			@if(Session::has('message'))
		            
						<div class="alert alert-success" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						  <span aria-hidden="true">&times;</span></button>
						  <strong><i class="fa fa-check"></i></strong> {{Session::get('message')}}
						</div> 							
				
					@endif

					<div class="page-profile">

						<div class="row">


							<!-- COL 2 -->
							<div class="col-md-12">

								<div class="tabs white nomargin-top">
									<ul class="nav nav-tabs tabs-primary">
										<li class="active">
											<a href="#consultar" data-toggle="tab"><i class="fa fa-address-card-o" aria-hidden="true"></i>Ver</a>
										</li>
										<li>
											<a href="#editar" data-toggle="tab"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar Tutorial</a>
										</li>

										<li>
											<a href="#editarMultimedia" data-toggle="tab"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar Multimedia</a>
										</li>
										<li>
											<a href="#eliminar" data-toggle="tab"><i class="fa fa-trash" aria-hidden="true"></i> Eliminar</a>
										</li>										
									</ul>

									<div class="tab-content">

										<!-- Overview -->

										<!-- Consultar -->
										<div id="consultar" class="tab-pane active">

											<div class="form-horizontal">
												<h4>Datos del Tutorial</h4>

													<section class="panel">

														<div class="panel-body noradius padding-10">

															<div class="form-group">

																<div class="col-md-6">
																	<center>
																		{!! html_entity_decode($tutorial->str_video) !!}
																  	</center>
																</div>

																<div class="col-md-6">
																	<center>
																	  	<figure class="margin-bottom-10"><!-- image -->
																	  		
																	  		<img src="data:image/jpeg;base64,{{ $tutorial->blb_img1 }}" alt="" title="" width="410">
																	  	</figure>
																  	</center>
																</div>																
															</div>
														</div>
													</section>

												<fieldset>

													<div class="form-group">
														<label class="col-md-3 control-label" for="">Estatus</label>
														<div class="col-md-8">
															<input type="text" readonly="yes" class="form-control" id="" value="{{ str_replace("-"," ",$tutorial->str_estatus)}}">
														</div>
													</div>

													<div class="form-group">
														<label class="col-md-3 control-label" for="">Título</label>
														<div class="col-md-8">
															<input type="text" readonly="yes" class="form-control" id="" value="{{ str_replace("-"," ",$tutorial->str_titulo)}}">
														</div>
													</div>

													<div class="form-group">
														<label class="col-md-3 control-label" for="">URL</label>
														<div class="col-md-8">
															<input type="text" readonly="yes" class="form-control" id="" value="{{ str_replace("-"," ",$tutorial->str_src)}}">
														</div>
													</div>

													<div class="form-group">
														<label class="col-md-3 control-label" for="">Descripción</label>
														<div class="col-md-8">
															{!! html_entity_decode($tutorial->str_post) !!}
														</div>
													</div>	

												</fieldset>

											</div>

										</div>										

										<!-- Editar -->
										<div id="editar" class="tab-pane">

											{!! Form::open(['route' => 'editarTutorial', 'id' => 'demo-form', '', 'enctype'=>'multipart/form-data', 'class' => 'form-horizontal ', 'data-success' => 'Se han editado los datos personales con éxito','data-toastr-position' => 'top-right', 'onsubmit' => 'location.reload()']) !!} 	
											{!! csrf_field() !!}											
												<h4>Datos del Tutorial</h4>

												{!! Form::input('hidden', 'id', $tutorial->idpost, ['id' => 'id', 'class'=> 'form-control required','maxlength'=> '10', 'readonly' ]) !!}  

												<fieldset>

													<div class="form-group">
														<label class="col-md-3 control-label" for="str_profesion">Estatus</label>
														<div class="col-md-8">
															<select name="str_estatus" class="form-control pointer required">
																<option value="">--- Seleccione ---</option>

																@foreach ($tipoEstatus as $value)
																				
																<option value="{{$value}}" <?php if ($value == $tutorial->str_estatus) {?> selected <?php }?> >{{$value}}</option>

																@endforeach

															</select>
														</div>
													</div>

													<div class="form-group">
														<label class="col-md-3 control-label" for="str_nombre">Título</label>
														<div class="col-md-8">
															{!! Form::input('text', 'str_titulo', str_replace("-"," ",$tutorial->str_titulo), ['id' => 'str_nombre', 'class'=> 'form-control required','maxlength'=> '255']) !!} 
														</div>
													</div>

													<div class="form-group">
														<label class="col-md-3 control-label" for="str_nombre">URL</label>
														<div class="col-md-8">
															{!! Form::input('text', 'str_src', str_replace("-"," ",$tutorial->str_src), ['id' => 'str_src', 'class'=> 'form-control required','maxlength'=> '255']) !!} 
														</div>
													</div>

													<div class="form-group">
														<label class="col-md-3 control-label">Miniatura de Youtube *</label>
														<div class="col-md-8">
{!! Form::file('blb_img1',['id' => 'blb_img1','data-btn-text' =>'Buscar Fotox', 'class' => 'custom-file-upload required']) !!}
			<small class="text-muted block">Tamaño máximo: 1Mb (jpg/png)</small>
														</div>
													</div>


													<div class="form-group">
														<label class="col-md-3 control-label" for="">Descripción del video</label>
														<div class="col-md-8">
															<textarea name="str_post" class="summernote form-control required" data-height="200" data-lang="en-US">
																{!! html_entity_decode($tutorial->str_post) !!}
															</textarea>
														</div>
													</div>	
																														
												</fieldset>

												<div class="row">
													<div class="col-md-9 col-md-offset-3">
														{!! Form::submit('MODIFICAR TUTORIAL', ['class' => 'btn btn-3d btn-teal btn-xlg btn-block margin-top-30']) !!}
													</div>
												</div>												

												{!! Form::close() !!}

										</div>

										<div id="editarMultimedia" class="tab-pane">

											@include('tutorial.multimediaVideo')

										</div>

										<div id="eliminar" class="tab-pane">


												{!! Form::open(['route' => 'eliminarTutorial', 'id' => 'clave-form', '', 'enctype'=>'multipart/form-data', 'class' => 'form-horizontal ', 'data-success' => 'Se ha eliminado el tutorial con éxito','data-toastr-position' => 'top-right', 'onsubmit' => '']) !!} 	
												<h4>Eliminar Tutorial</h4>
												{!! Form::input('hidden', 'id', $tutorial->idpost, ['id' => 'id', 'class'=> 'form-control required','maxlength'=> '10', 'readonly' ]) !!}  


												<div class="row">
													<div class="col-md-9 col-md-offset-3">
														{!! Form::submit('ELIMINAR TUTORIAL', ['class' => 'btn btn-3d btn-teal btn-xlg btn-block margin-top-30']) !!}
													</div>
												</div>

												{!! Form::close() !!}											


										</div>

									</div>
								</div>

							</div><!-- /COL 2 -->



						</div>

					</div>

				</div>
			</section>
			<!-- /MIDDLE -->

@endsection