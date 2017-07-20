@extends('layouts.app')

@section('title')

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
			
		</div>
	</div>
@endsection