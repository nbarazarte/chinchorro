<li>
	<a href="#">
		<i class="fa fa-menu-arrow pull-right"></i>
		<i class="main-icon fa fa-user""></i> <span>Autores</span>
	</a>
	<ul>
		<li><a href="{{ route('registrarAu')}}">Nuevo</a></li>
		<li><a href="{{ route('buscarCuentaAu')}}">Buscar</a></li>
	</ul>
</li>
<li>
	<a href="#">
		<i class="fa fa-menu-arrow pull-right"></i>
		<i class="main-icon fa fa-id-card-o""></i> <span>Noticias</span>
	</a>
	<ul><!-- submenus -->
		<li><a href="{{ route('registrarNoticia') }}">Nuevo</a></li>
		<li><a href="{{ route('buscarNoticia') }}">Buscar</a></li>
	</ul>
</li>
<li>
	<a href="#">
		<i class="fa fa-menu-arrow pull-right"></i>
		<i class="main-icon fa fa-graduation-cap"></i> <span>Tutoriales</span>
	</a>
	<ul><!-- submenus -->
		<li><a href="{{ route('registrarTutorial')}}">Nuevo</a></li>
		<li><a href="{{ route('buscarTutorial')}}">Buscar</a></li>
	</ul>
</li>