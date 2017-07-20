<?php

namespace GameCollection;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function games() {
        return $this->belongsToMany('GameCollection\Game')
            ->withPivot('has_game', 'has_box', 'has_manual')
            ->withTimestamps();
    }

    public function has_game($game_id) {
        return \DB::table('game_user')->where([
            'user_id' => \Auth::user()->id,
            'game_id' => $game_id,
        ])->value('has_game');
    }

    public function has_box($game_id) {
        return \DB::table('game_user')->where([
            'user_id' => \Auth::user()->id,
            'game_id' => $game_id,
        ])->value('has_box');
    }

    public function has_manual($game_id) {
        return \DB::table('game_user')->where([
            'user_id' => \Auth::user()->id,
            'game_id' => $game_id,
        ])->value('has_manual');
    }

    public function game_count($platform) {
        $games = \GameCollection\Game::where('platform', $platform)->pluck('id');
        return \DB::table('game_user')
            ->where([
                'user_id' => \Auth::user()->id,
                'has_game' => true,
            ])
            ->whereIn('game_id', $games)
            ->count();
    }

    public function box_count($platform) {
        $games = \GameCollection\Game::where('platform', $platform)->pluck('id');
        return \DB::table('game_user')
            ->where([
                'user_id' => \Auth::user()->id,
                'has_box' => true,
            ])
            ->whereIn('game_id', $games)
            ->count();
    }

    public function manual_count($platform) {
        $games = \GameCollection\Game::where('platform', $platform)->pluck('id');
        return \DB::table('game_user')
            ->where([
                'user_id' => \Auth::user()->id,
                'has_manual' => true,
            ])
            ->whereIn('game_id', $games)
            ->count();
    }
}
