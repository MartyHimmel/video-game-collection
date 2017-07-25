@extends('layouts.app')

@section('title')
	{{ $game->name }}
@endsection

@section('custom_styles')

@endsection

@section('custom_scripts')

@endsection

@section('content')
	<div class="row">
		<div class="col-sm-3 col-md-2 sidebar">
			@include('layouts.sidebar-nav')
		</div>

		<div class="col-sm-9 col-md-10 main">
			@include('partials.flash-message')

			<div class="col-sm-4 col-xs-12">
				<p>Title: {{ $game->name }}</p>
				<p>Platform: {{ $game->platform }}</p>
				<p>Developer: {{ $game->developer }}</p>
				<p>Publisher: {{ $game->publisher }}</p>
				<p>Release Date: {{ $game->release_date }}</p>
				<p>Region: {{ implode(', ', $game->region) }}</p>
				<p>Genre: {{ $game->genre }}</p>
				<p>
					<a href="{{ url('/games/' . $game->id . '/edit') }}">
						<button type="button" class="btn btn-primary">Edit Game</button>
					</a>
				</p>
			</div>
			<div class="col-sm-8 col-xs-12">
				
			</div>
		</div>
	</div>
@endsection