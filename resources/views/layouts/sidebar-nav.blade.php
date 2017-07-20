<ul class="nav nav-sidebar">
	<li data-toggle="collapse" data-target="#sidebar-systems"><a>Systems <span class="caret"></span></a></li>
</ul>
<ul class="nav nav-sidebar collapse" id="sidebar-systems">
	@foreach (\GameCollection\Game::PLATFORMS as $platform_key => $platform_name)
		<li><a href="{{ url('/' . $platform_key) }}">{{ $platform_name }}</a></li>
	@endforeach
</ul>