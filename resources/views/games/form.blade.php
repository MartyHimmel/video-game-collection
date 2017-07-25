<div class="form-group">
	<label for="game_name">Name</label>
	<input type="text" name="game_name" class="form-control"
		value="{{ $game->name or old('game_name') }}">
</div>
<div class="form-group">
	<label for="game_platform">Platform</label>
	<select name="game_platform" class="form-control">
		<option value="">Select Platform</option>
		@foreach (\GameCollection\Game::PLATFORMS as $platform_key => $platform_name)
			<option value="{{ $platform_key }}" 
			@if ((isset($game) && $game->platform == $platform_key) || old('game_platform') == $platform_key)
				selected
			@endif
			>{{ $platform_name }}</option>
		@endforeach
	</select>
</div>
<div class="form-group">
	<label for="game_developer">Developer</label>
	<input type="text" name="game_developer" class="form-control"
		value="{{ $game->developer or old('game_developer') }}">
</div>
<div class="form-group">
	<label for="game_publisher">Publisher</label>
	<input type="text" name="game_publisher" class="form-control"
		 value="{{ $game->publisher or old('game_publisher') }}">
</div>
<div class="form-group">
	<label for="game_release_date">Release Date</label>
	<input type="text" name="game_release_date" class="form-control"
		 value="{{ $game->release_date or old('game_release_date') }}">
</div>
<div class="form-group">
	<label>Region</label>
	@foreach (\GameCollection\Game::REGIONS as $region_key => $region_name)
		<div class="checkbox">
			<label>
				<input type="checkbox" name="game_region[]" class="checkbox" value="{{ $region_key }}" 
				@if ((isset($game) && in_array($region_key, $game->region)) ||
						in_array($region_key, old('game_region', [])))
					checked
				@endif
				> {{ $region_name }}
			</label>
		</div>
	@endforeach
</div>
<div class="form-group">
	<label for="game_genre">Genre</label>
	<input type="text" name="game_genre" class="form-control"
		 value="{{ $game->genre or old('game_genre') }}">
</div>
<button type="submit" class="btn btn-primary" value="submit">{{ $button_text }}</button>