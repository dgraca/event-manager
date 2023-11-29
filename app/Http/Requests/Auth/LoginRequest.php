<?php

namespace App\Http\Requests\Auth;

use Laravel\Fortify\Fortify;
use Illuminate\Foundation\Http\FormRequest;

//TODO APAgar isto que não está em uso, porque usei um middleware
class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            Fortify::username() => 'required|string',
            'password' => 'required|string',
            'g-recaptcha-response' => config('recaptchav3.enable') ? ['required', 'recaptchav3:login,0.5'] : '',
        ];
    }
}
