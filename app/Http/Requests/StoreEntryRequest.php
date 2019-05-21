<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEntryRequesT extends FormRequest
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
             'title' => [            // Правила валидации для поля name                 
			 'max:16',         		// Длина не более 32 Б                 
			 'min:1',              // Длина не менее 1 Б                            
			 'required',               // Обязательное поле                 
			 'unique:entries',           // Не допускать повторов в таблице rooms             
			 ],
			 
			 'content' => [            // Правила валидации для поля name                 
			 'max:50',         		// Длина не более 32 Б                 
			 'min:1',              // Длина не менее 1 Б                            
			 'required',               // Обязательное поле                            
			 ]
        ];
    }
}
