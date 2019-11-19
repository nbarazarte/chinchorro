@extends('app')

@section('content')

@include('menu')


<div id="pagina"></div>

			<!-- 
				MIDDLE 
			-->
			<section id="middle">


				<!-- page title -->
				<header id="page-header">
					<h1>Buscar Tutorial</h1>
					<ol class="breadcrumb">
					 <li><a href="{{ route('home')}}">Dashboard</a></li>
					  <li class="active">Buscar Tutorial</li>
					</ol>


					
				</header>
				<!-- /page title -->


				<div id="content" class="padding-20">


					<!-- 
						PANEL CLASSES:
							panel-default
							panel-danger
							panel-warning
							panel-info
							panel-success

						INFO: 	panel collapse - stored on user localStorage (handled by app.js _panels() function).
								All pannels should have an unique ID or the panel collapse status will not be stored!
					-->
					<div id="panel-1" class="panel panel-default">
						<div class="panel-heading">
							<span class="title elipsis">
								<strong>LISTADO DE TUTORIALES</strong> <!-- panel title -->
							</span>

							<!-- right options -->
							<ul class="options pull-right list-inline">
								<li><a href="#" class="opt panel_colapse" data-toggle="tooltip" title="Minimizar" data-placement="bottom"></a></li>
								<li><a href="#" class="opt panel_fullscreen hidden-xs" data-toggle="tooltip" title="Pantalla Completa" data-placement="bottom"><i class="fa fa-expand"></i></a></li>

							</ul>
							<!-- /right options -->

						</div>

						<!-- panel content -->
						<div class="panel-body">

							<table class="table table-striped table-bordered table-hover" id="datatable_sample">
								<thead>
									<tr>
										<th>Ver</th>
										<th>Imágen</th>
										<th>Título</th>
										<th>Fecha</th>
										<th>Estatus</th>
										<th>Usuario</th>
									</tr>
								</thead>

								<tbody>

									@foreach ($tutoriales as $tutorial)

										<tr class="odd gradeX">

												<td>

													<a href="{{ route('verTutorial',[$tutorial->idpost]) }}" type="button" class="btn btn-warning">
														
														<i class="fa fa-search" aria-hidden="true"></i>

													</a>

												</td>

												<td>

													<div class="margin-bottom-20">
														<div class="embed-responsive embed-responsive-16by9">
															{!! html_entity_decode($tutorial->str_video) !!}
														</div>
													</div>	
													 
												</td>												

												<td>
													 	{{ str_replace("-"," ",$tutorial->str_titulo) }}
												</td>

												<td>
													 	{{ $tutorial->fecha }}
												</td>

												<td> 
														{{ $tutorial->str_estatus }}
												</td>
												
												<td> 
														<div class="row">
															<div class="col-md-4">
															  	<center>
																  	<figure class="margin-bottom-10"><!-- image -->
																		<img src="data:image/jpeg;base64,{{ $tutorial->img_usuario }}" alt="" title="" height="34">
																	</figure>
																</center>
															</div>
															<div class="col-md-8">{{ $tutorial->usuario }}</div>
														</div>

												</td>

										</tr>

									@endforeach

								</tbody>
							</table>

						</div>
						<!-- /panel content -->

					</div>
					<!-- /PANEL -->

				</div>
			</section>
			<!-- /MIDDLE -->

@endsection