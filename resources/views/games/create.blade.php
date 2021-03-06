@extends('layouts.app')

@section('title')
	Add Game
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
			@include('errors.form-errors')
			
			<form action="{{ action('GameController@store') }}" method="post" class="game-list-form">
				{{ csrf_field() }}
				@include('games.form')
			</form>
		</div>
	</div>
@endsection