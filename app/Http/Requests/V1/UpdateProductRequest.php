<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $method = $this->method();

        if ($method == 'PUT') {
        return [
                'name' => ['required'],
                'display_name' => ['required'],
                'code' => ['required'],
                'image_path' => ['required'],
                'description' => ['required'],
            ];
        } else {
            return [
                'name' => ['sometimes','required'],
                'display_name' => ['sometimes','required'],
                'code' => ['sometimes','required'],
                'image_path' => ['sometimes','required'],
                'description' => ['sometimes','required'],
            ];
        }
    }
    // protected function prepareForValidation() {
    //     if($this->postalCode){
    //     $this->merge([
    //         'postal_code' =>$this->postalCode
    //     ]);
    // }
    // }
}
