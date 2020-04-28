<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function wantsJson()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|max:254',
            'content' => 'required',
            'description' => 'required|max:254',
        ];
    }
}