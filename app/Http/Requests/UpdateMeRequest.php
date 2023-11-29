<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateMeRequest extends FormRequest
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
        $user = auth()->user();
        $rules = User::rules();
        $rules['email'] = ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)];
        unset($rules['activity_blocked']);
        if($user->activity_blocked){
            $excludeExtended = ['rd_1', 'rd_2', 'rd_3', 'rd_4', 'rd_5', 'rd_6', 'rd_7', 'rd_8', 'rd_9', 'rd_10', 'rd_11', 'fr_1', 'fr_2', 'fr_3', 'fr_4', 'fr_5', 'fr_6', 'fr_7', 'fv_1', 'fv_2', 'fv_3', 'fv_4', 'fv_5', 'mm_1', 'mm_2', 'mm_3', 'mm_4', 'mm_5', 'mm_6', 'mm_7', 'mm_8', 'mr_1', 'mr_2', 'mr_3', 'mr_4', 'mr_5', 'mr_6', 'pt_1', 'pt_2', 'pt_3'];
            $rules = array_diff_key($rules, array_flip($excludeExtended));
        }
        return $rules;
    }
}
