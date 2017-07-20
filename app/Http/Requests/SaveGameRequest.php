<?php

namespace GameCollection\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveGameRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'game_name' => 'required|max:128',
            'game_platform' => 'required|max:32',
            'game_developer' => 'nullable|max:64',
            'game_publisher' => 'nullable|max:64',
            'game_release_date' => 'nullable|max:64',
            'game_region' => 'nullable|max:2',
            'game_genre' => 'nullable|max:128',
        ];
    }

    public function messages() {
        return [
            'game_name.required' => 'A name is required',
            'game_platform.required' => 'Select a platform',
            'game_developer.max' => 'The developer cannot be more than 64 characters',
            'game_publisher.max' => 'The publisher cannot be more than 64 characters',
            'game_release_date.max' => 'The release cannot be more than 64 characters',
            'game_region.max' => 'The region cannot be more than 2 characters',
            'game_genre.max' => 'The genre cannot be more than 128 characters',
        ];
    }
}
