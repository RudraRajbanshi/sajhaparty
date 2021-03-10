<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMemberRequest extends FormRequest
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
            'mobile' => ['required'],
            'identity_image' => ['mimes:pdf,jpeg'],
            'photo_for_id_card' => ['mimes:png,jpeg'],
            'membership_form' => ['mimes:png,jpeg,pdf'],
        ];
    }
}
