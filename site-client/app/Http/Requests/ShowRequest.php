<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class ShowRequest extends FormRequest
{
    public function wantsJson()
    {
        return true;
    }

    public function rules()
    {
        return [
            'page_uid' => 'required|string',
        ];
    }
}