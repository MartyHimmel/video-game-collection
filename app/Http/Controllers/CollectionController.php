<?php

namespace GameCollection\Http\Controllers;

use Illuminate\Http\Request;

class CollectionController extends Controller
{

	public function platform($platform) {
		if (!array_key_exists($platform, \GameCollection\Game::PLATFORMS)) {
			return view('errors.404');
		}
		
		$platform_name = \GameCollection\Game::PLATFORMS[$platform];
		$region = empty(request()->input('region')) ? 'NA' : request()->input('region');
		return view('gamelists.index')->with([
			'title' => $platform_name . ' Games',
			'games' => \GameCollection\Game::platform($platform)
				->region($region)
				->orderBy('name', 'asc')
				->paginate(100),
			'action' => url('/' . $platform),
		]);
	}

	public function save(Request $request) {
		$sync_data = [];
		$sync_data = $this->add_data($request, 'add_games', $sync_data, 'has_game');
		$sync_data = $this->add_data($request, 'add_boxes', $sync_data, 'has_box');
		$sync_data = $this->add_data($request, 'add_manuals', $sync_data, 'has_manual');
		$sync_data = $this->remove_data($request, 'remove_games', $sync_data, 'has_game');
		$sync_data = $this->remove_data($request, 'remove_boxes', $sync_data, 'has_box');
		$sync_data = $this->remove_data($request, 'remove_manuals', $sync_data, 'has_manual');
		\Auth::user()->games()->syncWithoutDetaching($sync_data);
		session()->flash('status', 'success');
		session()->flash('message', 'Your collection has been updated');
		return redirect()->back();
	}

	private function add_data($request, $input, $sync_data, $column) {
		if (empty($request->input($input))) {
			return $sync_data;
		}
		$ids = explode(',', $request->input($input));
		foreach ($ids as $id) {
			if (!array_key_exists($id, $sync_data)) {
				$sync_data[$id] = [];
			}
			$sync_data[$id][$column] = true;
		}
		return $sync_data;
	}

	private function remove_data($request, $input, $sync_data, $column) {
		if (empty($request->input($input))) {
			return $sync_data;
		}
		$ids = explode(',', $request->input($input));
		foreach ($ids as $id) {
			if (!array_key_exists($id, $sync_data)) {
				$sync_data[$id] = [];
			}
			$sync_data[$id][$column] = false;
		}
		return $sync_data;
	}
}
