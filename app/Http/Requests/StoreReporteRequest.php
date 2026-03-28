<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReporteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Todos los usuarios autenticados pueden crear reportes
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'location' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'min:10', 'max:1000'],
            'priority' => ['required', 'in:baja,media,alta'],
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'location.required' => 'La ubicación es obligatoria',
            'location.string' => 'La ubicación debe ser texto',
            'location.max' => 'La ubicación no debe superar los 255 caracteres',
            
            'description.required' => 'La descripción es obligatoria',
            'description.string' => 'La descripción debe ser texto',
            'description.min' => 'La descripción debe tener al menos 10 caracteres',
            'description.max' => 'La descripción no debe superar los 1000 caracteres',
            
            'priority.required' => 'La prioridad es obligatoria',
            'priority.in' => 'La prioridad debe ser: baja, media o alta',
            
            'photo.nullable' => 'La foto es opcional',
            'photo.image' => 'El archivo debe ser una imagen',
            'photo.mimes' => 'La imagen debe ser formato: jpeg, png, jpg o gif',
            'photo.max' => 'La imagen no debe superar los 2MB',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'location' => 'ubicación',
            'description' => 'descripción',
            'priority' => 'prioridad',
            'photo' => 'foto',
        ];
    }
}
