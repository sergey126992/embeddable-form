<?php


namespace App\Services;


use App\Models\Data;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class DataCreate
{
    public static function create(array $data)
    {
        $validator = Validator::make($data, [
            'title' => 'required|max:254',
            'content' => 'required',
            'description' => 'required|max:254',
        ]);

        if ($validator->fails()) {
            throw ValidationException::withMessages($validator->validated());
        }

        return Data::create([
            'title' => $data['title'],
            'content' => $data['content'],
            'description' => $data['description'],
            'page_uid' => Str::uuid()
        ]);
    }

}