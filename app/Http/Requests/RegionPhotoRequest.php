<?php

namespace App\Http\Requests;

use App\Region;
use App\Http\Requests\Request;

class RegionPhotoRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Region::where([
            'zip' => $this->zip,
            'street' => $this->street,
            'user_id' => $this->user()->id
        ])->exists();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
           'photo' => 'required|mimes:jpg,jpeg,png,gif'
        ];
    }
}
