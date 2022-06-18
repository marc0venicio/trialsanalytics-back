<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule as ValidationRule;

class StoreProofRequest extends BaseFormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "subject"  => "required|string",
            "discipline" => "required|string",
            "description" => "required|string",
            //"questions" => $this->questions()
        ]+$this->questions();
    }

    // private function questions(){
    //     return [
    //         'questions.alternatives' => 'required|string',
    //         'questions.description' => 'required|string',
    //         'questions.answer' => 'required|string',
    //     ];
    // }

    /**
     * @return array
     */
    private function questions(): array
    {
        return [
            'questions.*.alternatives' => 'required|array',
            'questions.*.description' => 'required|string',
            'questions.*.answer' =>  ['required',ValidationRule::in(['a', 'b', 'c', 'd','e'])],
        ];
    }
}
