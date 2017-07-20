<?php

namespace GameCollection\Http\Controllers;

use GameCollection\Game;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('games.create')->with([
            'button_text' => 'Create Game',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(\GameCollection\Http\Requests\SaveGameRequest $request)
    {
        $game = new Game();
        $game->name = $request->input('game_name');
        $game->platform = $request->input('game_platform');
        $game->developer = $request->input('game_developer');
        $game->publisher = $request->input('game_publisher');
        $game->release_date = $request->input('game_release_date');
        $game->genre = $request->input('game_genre');
        $game->region = $request->input('game_region');
        $game->created_at = \Carbon\Carbon::now();
        $game->updated_at = \Carbon\Carbon::now();
        if ($game->save()) {
            session()->flash('status', 'success');
            session()->flash('message', 'The game has been saved');
        } else {
            session()->flash('status', 'error');
            session()->flash('message', 'There was an error saving the game');
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \GameCollection\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        return view('games.show')->with([
            'game' => $game,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \GameCollection\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        return view('games.update')->with([
            'game' => $game,
            'button_text' => 'Update Game',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \GameCollection\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(\GameCollection\Http\Requests\SaveGameRequest $request, Game $game)
    {
        $game->name = $request->input('game_name');
        $game->platform = $request->input('game_platform');
        $game->developer = $request->input('game_developer');
        $game->publisher = $request->input('game_publisher');
        $game->release_date = $request->input('game_release_date');
        $game->genre = $request->input('game_genre');
        $game->region = $request->input('game_region');
        $game->updated_at = \Carbon\Carbon::now();
        if ($game->save()) {
            session()->flash('status', 'success');
            session()->flash('message', 'The game has been updated');
        } else {
            session()->flash('status', 'error');
            session()->flash('message', 'There was an error updating the game');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \GameCollection\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        //
    }
}
