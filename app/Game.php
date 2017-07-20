<?php

namespace GameCollection;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    const PLATFORMS = [
        '3do' => '3DO',
        'jaguar' => 'Atari Jaguar',
        'jaguarcd' => 'Atari Jaguar CD',
        'dreamcast' => 'Dreamcast',
        'gameboy' => 'Game Boy',
        'gba' => 'Game Boy Advance',
        'gbc' => 'Game Boy Color',
        'gamecube' => 'GameCube',
        'gamegear' => 'Game Gear',
        'lynx' => 'Lynx',
        'neogeo' => 'Neo Geo',
        'neogeocd' => 'Neo Geo CD',
        'neogeopocket' => 'Neo Geo Pocket',
        'nes' => 'NES',
        '3ds' => 'Nintendo 3DS',
        'n64' => 'Nintendo 64',
        'ds' => 'Nintendo DS',
        'ps1' => 'Playstation',
        'ps2' => 'Playstation 2',
        'ps3' => 'Playstation 3',
        'ps4' => 'Playstation 4',
        'psp' => 'PSP',
        '32x' => 'Sega 32X',
        'segacd' => 'Sega CD',
        'genesis' => 'Sega Genesis',
        'mastersystem' => 'Sega Master System',
        'saturn' => 'Sega Saturn',
        'snes' => 'SNES',
        'switch' => 'Switch',
        'turbografx16' => 'TurboGrafx-16',
        'turbografxcd' => 'TurboGrafx-CD',
        'virtualboy' => 'Virtual Boy',
        'vita' => 'Vita',
        'wii' => 'Wii',
        'wiiu' => 'Wii U',
        'xbox' => 'Xbox',
        'xbox360' => 'Xbox 360',
        'xboxone' => 'Xbox One',
    ];

    const REGIONS = [
        'NA' => 'NTSC-U',
        'JP' => 'NTSC-J',
        'EU' => 'PAL',
        'CH' => 'NTSC-C',
    ];

    protected $fillable = [
    	'name',
        'platform',
        'developer',
        'publisher',
        'release_date',
        'genre',
        'region',
        'box_front',
        'box_back',
        'cart_cover',
    ];

    public function users() {
    	return $this->belongsToMany('GameCollection\User')
    		->withPivot('has_game', 'has_box', 'has_manual')
    		->withTimestamps();
    }

    public function scopeRegion($query, $region) {
        return $query->where('region', $region);
    }

    public function scopePlatform($query, $platform) {
        return $query->where('platform', $platform);
    }

    public function scopePlatformCount($query, $platform) {
        return $query->where('platform', $platform)->count();
    }
}
