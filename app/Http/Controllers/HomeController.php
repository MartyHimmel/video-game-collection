<?php

namespace GameCollection\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $platforms = \GameCollection\Game::PLATFORMS;
        return view('home')->with([
            'platforms' => $platforms,
            'game_counts' => $this->count_collection($platforms),
        ]);
    }

    private function count_collection($platforms) {
        $game_counts = [];
        if (!\Auth::check()) {
            return $game_counts;
        }
        foreach ($platforms as $key => $value) {
            $game_counts[$key] = [
                'games' => \Auth::user()->game_count($key),
                'boxes' => \Auth::user()->box_count($key),
                'manuals' => \Auth::user()->manual_count($key),
                'in_collection' => true,
            ];
            if (empty($game_counts[$key]['games']) && empty($game_counts[$key]['boxes']) &&
                    empty($game_counts[$key]['manuals'])) {
                $game_counts[$key]['in_collection'] = false;
            }
        }
        return $game_counts;
    }
}
