<?php

namespace App\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

abstract class BaseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->merge($this->sanitize($this->all()));
    }

    protected function sanitize(array $data): array
    {
        return array_map(function ($item) {
            return is_string($item) ? strip_tags(trim($item)) : $item;
        }, $data);
    }

    //    public function withValidator(Validator $validator): void {
    //        $validator->after(function ($validator) {
    //          ##
    //        });
    //    }

    protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Validation failed.',
            'errors' => $validator->errors(),
        ], 422));
    }
}
