<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendMailRequest extends FormRequest
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

//    /**
//     * Prepare the data for validation.
//     *
//     * @return void
//     */
//    protected function prepareForValidation()
//    {
//        $this->merge([
//          'algo' => 'algo'
//        ]);
//    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:50',
            'email' => 'required|email:rfc,dns',
            'tel' => 'nullable|regex:/^[679]{1}[0-9]{8}$/',
            'file' => 'nullable|mimes:pdf,jpg,jpeg,png,csv,txt,xlx,xls|max:15000',
            'subject' => 'required|string|max:50',
            'details' => 'required|string|min:20|max:255'
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => 'nombre del remitente',
            'email' => 'email del remitente',
            'tel' => 'teléfono del remitente',
            'file' => 'archivo adjunto',
            'subject' => 'asunto del mensaje',
            'details' => 'detalle del mensaje'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => 'El :attribute es obligatorio.',
            'string' => 'El :attribute debe ser de tipo texto.',
            'max' => 'El :attribute debe ser menor a :max.',
            'email' => 'El :attribute debe ser de tipo email y tener un formato correcto.',
            'regex' => 'El :attribute debe cumplir el formato.',
            'mimes' => 'El :attribute debe tener el formato correcto :values.',
            'min' => 'El :attribute debe tener al menos el tamaño :min.'
        ];
    }
}
