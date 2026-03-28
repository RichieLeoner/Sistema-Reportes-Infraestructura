<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReporteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Solo admin y mantenimiento pueden actualizar reportes
        $user = $this->user();
        return $user && ($user->role->name === 'admin' || $user->role->name === 'mantenimiento');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'status' => ['required', 'in:pendiente,en_proceso,resuelto'],
            'priority' => ['required', 'in:baja,media,alta'],
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
            'status.required' => 'El estado es obligatorio',
            'status.in' => 'El estado debe ser: pendiente, en_proceso o resuelto',
            
            'priority.required' => 'La prioridad es obligatoria',
            'priority.in' => 'La prioridad debe ser: baja, media o alta',
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
            'status' => 'estado',
            'priority' => 'prioridad',
        ];
    }
}
