@extends('layouts.app')

@section('title')
	{{ $title }}
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

			<form action="{{ $action }}" method="post" class="game-list-form">
				{{ csrf_field() }}
				{{ $games->links() }}
				<table class="table table-striped table-condensed game-list-table">
					<thead>
						<th>Name</th>
						<th class="checklist">Game</th>
						<th class="checklist">Box</th>
						<th class="checklist">Manual</th>
					</thead>
					<tbody>
						@foreach ($games as $game)
							<tr>
								<td><a href="/games/{{ $game->id }}">{{ $game->name }}</a></td>
								<td class="checklist">
									<input type="checkbox" name="has_game[]" value="{{ $game->id }}"
										@if (Auth::user()->has_game($game->id)) checked @endif>
								</td>
								<td class="checklist">
									<input type="checkbox" name="has_box[]" value="{{ $game->id }}"
										@if (Auth::user()->has_box($game->id)) checked @endif>
								</td>
								<td class="checklist">
									<input type="checkbox" name="has_manual[]" value="{{ $game->id }}"
										@if (Auth::user()->has_manual($game->id)) checked @endif>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
				{{ $games->links() }}
				<div>
					<input type="hidden" name="add_games" value="">
					<input type="hidden" name="add_boxes" value="">
					<input type="hidden" name="add_manuals" value="">
					<input type="hidden" name="remove_games" value="">
					<input type="hidden" name="remove_boxes" value="">
					<input type="hidden" name="remove_manuals" value="">
					<input type="submit" class="btn btn-primary" value="Save Changes">
				</div>
			</form>
		</div>
	</div>
@endsection