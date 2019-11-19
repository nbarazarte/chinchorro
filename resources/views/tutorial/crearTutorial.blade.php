@extends('app')

@section('content')

@include('menu')

			<!-- 
				MIDDLE 
			-->
			<section id="middle">


				<!-- page title -->
				<header id="page-header">
					<h1>Crear Tutorial</h1>
					<ol class="breadcrumb">
						<li><a href="{{ route('home')}}">Dashboard</a></li>
						<li class="active">Crear Tutorial</li>
					</ol>
				</header>
				<!-- /page title -->


				<div id="content" class="padding-20">

					<div class="row">

						<div class="col-md-12">

							<!-- ------ -->
							<div class="panel panel-default">

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

								<div class="panel-heading">
									<span class="title elipsis">
										<strong>Datos del Tutorial</strong> <!-- panel title -->
									</span>

									<!-- right options -->
									<ul class="options pull-right list-inline">
										<li><a href="#" class="opt panel_colapse" data-toggle="tooltip" title="Minimizar" data-placement="bottom"></a></li>
										<li><a href="#" class="opt panel_fullscreen hidden-xs" data-toggle="tooltip" title="Pantalla Completa" data-placement="bottom"><i class="fa fa-expand"></i></a></li>

									</ul>
									<!-- /right options -->

								</div>

								<div class="panel-body">

								{!! Form::open(['route' => 'registrarTutorial', 'id' => 'demo-form', '', 'enctype'=>'multipart/form-data', 'class' => 'sky-form boxed ', 'data-success' => 'Se ha creado el Post con éxito','data-toastr-position' => 'top-right']) !!} 										

											<fieldset>
												
												<!-- required [php action request] -->
												<input type="hidden" name="action" value="contact_send" />


												<div class="row">
													<div class="form-group">

														<div class="col-md-12 col-sm-12">

															<label>Título del Tutorial *</label>
	
															<label class="input">
																<i class="icon-append fa fa-edit"></i>
																{!! Form::input('text', 'str_titulo', '', ['id' => 'str_titulo', 'class'=> 'form-control required','maxlength'=> '100']) !!}  
																<span class="tooltip tooltip-top-right">Ingrese el título del Post</span>
															</label>
														</div>

													</div>
												</div>

												<div class="row">
													<div class="form-group">
														<div class="col-md-12 col-sm-12">

															<textarea id="str_video" name="str_video" class="form-control required" placeholder="Ejemplo: <iframe class=embed-responsive-item width=560 height=315 src=http://www.youtube.com/embed/W7Las-MJnJo></iframe>" rows="4" cols="350"></textarea>
															<span class="tooltip tooltip-top-right">Ingrese el link de Youtube</span>

														</div>
													</div>
												</div>

												<div class="row">

													<div class="form-group">

														<div class="col-md-12 col-sm-12">
															<label>
																Descripción *
																<small class="text-muted"></small>
															</label>

															<textarea name="str_post" class="summernote form-control required" data-height="200" data-lang="en-US"></textarea>										
														</div>
													</div>
												</div>

												<div class="row">

													<div class="form-group">

														<div class="col-md-11 col-sm-11">
														
															{!! Form::submit('CREAR TUTORIAL', ['class' => 'btn btn-3d btn-teal btn-xlg btn-block margin-top-30']) !!}																								
														</div>
													</div>
												</div>

											</fieldset>

										{!! Form::close() !!}

								</div>

							</div>
							<!-- /----- -->

						</div>

					</div>

				</div>
			</section>
			<!-- /MIDDLE -->

@endsection