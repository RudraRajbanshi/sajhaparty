<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreMemberRequest extends FormRequest
{
    public function authorize()
    {
        // abort_if(Gate::denies('member_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [

            'email' => ['unique:members,email'],
            'mobile' => ['required', 'numeric','digits:10','unique:members,mobile'],
            'identity_image' => ['mimes:pdf,jpeg'],
            'photo_for_id_card' => ['mimes:png,jpeg'],
            'membership_form' => ['mimes:png,jpeg,pdf'],


        ];
    }

    public function messages()
    {
        return [
            'date_of_birth.*.required' => 'Date Of Birth is required'
        ];
    }


}
