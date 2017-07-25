@extends('layouts.app')

@section('title')
	Dashboard
@endsection

@section('content')
	@if(!Auth::check())
		<div class="row">
			<div class="col-md-8 col-md-offset-2 main">
				<div class="panel panel-default">
					<div class="panel-body">
						<p>Site for tracking what games you own.</p>
						<p>Login or register to continue.</p>
					</div>
				</div>
			</div>
		</div>
	@else
		<div class="row">
			<div class="col-sm-3 col-md-2 sidebar">
				@include('layouts.sidebar-nav')
			</div>
			<div class="col-sm-9 col-md-10 main">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>Platform</th>
							<th>Games Owned</th>
							<th>Boxes Owned</th>
							<th>Manuals Owned</th>
						</tr>
					</thead>
					<tbody>
						@foreach($platforms as $platform_key => $platform_text)
							@if (!$game_counts[$platform_key]['in_collection'])
								@continue
							@endif
							<tr>
								<td><a href="{{ url('/' . $platform_key) }}">{{ $platform_text }}</a></td>
								<td>{{ $game_counts[$platform_key]['games'] }}</td>
								<td>{{ $game_counts[$platform_key]['boxes'] }}</td>
								<td>{{ $game_counts[$platform_key]['manuals'] }}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	@endif
@endsection
