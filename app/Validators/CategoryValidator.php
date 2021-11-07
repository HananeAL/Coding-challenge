<?php
namespace App\Validators;

use Illuminate\Support\Facades\Validator;

class CategoryValidator
{

    public function validate(array $data)
    {
        $validator = Validator::make($data, [
            'name' => 'required|unique:categories|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/',
            'parent_id' => 'nullable|exists:categories,id',
        ]);

        return $validator;
    }

}
