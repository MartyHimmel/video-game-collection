@extends('layouts.app')

@section('title')
	404 - Page Not Found
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
			<h3>Game Over!</h3>
			<p>That page couldn't be found.</p>
		</div>
	</div>
@endsection