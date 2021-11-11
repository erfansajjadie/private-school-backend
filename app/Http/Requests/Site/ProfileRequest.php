<?php

namespace App\Http\Requests\Api\v1;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProfileRequest extends FormRequest
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
            'first_name' => 'sometimes|required',
            'last_name' => 'sometimes|required',
            'profile_image' => 'sometimes|required|image',
            'user_name' => 'sometimes|required|unique:users',
            'phone' => 'sometimes|required|iran_mobile|unique:users',
            'sheba' => 'sometimes|required',
            'is_private' => 'sometimes|required|integer|between:0,1',
            'private_price' => 'sometimes|required|integer',
            'category_id' => 'sometimes|required|integer|exists:categories,id',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors()->first();

        throw new HttpResponseException(
            response()->json([
                'success' => false,
                'message' => $errors,
            ], 400)
        );
    }
}
