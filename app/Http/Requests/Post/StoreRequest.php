<?php

namespace App\Http\Requests\post;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * se aplica en true para aplicar las reglas de validacion
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            // 'slug' => Str::slug($this->title),
            // 'slug' => Str::of($this->title)->slug()->append('-ad')
            'slug' => str($this->title)->slug()
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|min:5|max:255',
            'content' => 'required|min:7',
            'category_id' => 'required',
            'description' => 'required|min:7',
            'posted' => 'required',
            'slug' => 'required|min:5|max:255|unique:posts'
        ];
    }
}
