<?php

namespace App\Validators;

use Illuminate\Support\Facades\Validator;

class ProductValidator
{
    public function validate(array $data)
    {
        $validator = Validator::make($data, $this->rules());
        $validator->validated();
    }

    private function rules()
    {
        return [
            'name' => 'required|max:30|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/',
            'description' => 'required|max:1000|string',
            'price' => 'required|numeric',
            'image' => 'required|base64file|base64image|base64max:1024',
            'categories' => 'nullable|exists:categories,id|array',
        ];
    }
}
