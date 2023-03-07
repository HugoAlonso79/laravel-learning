<?php

namespace App\Http\Requests\post;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class PutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * se aplica en true para aplicar las reglas de validacion
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        // dd($this->route('post')->id);
        return [
            'title' => 'required|min:5|max:255',
            'content' => 'required|min:7',
            'category_id' => 'required',
            'description' => 'required|min:7',
            'posted' => 'required',
            'slug' => 'required|min:5|max:255|unique:posts,slug,'.$this->route('post')->id,
            'image' => 'mimes:jpeg,jpg,png|max:10240'
        ];
    }
}