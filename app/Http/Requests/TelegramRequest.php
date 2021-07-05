<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TelegramRequest extends FormRequest
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
            'chat_id' => ['integer'],
            'first_name' => ['string'],
            'message_text' => ['string']
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'chat_id' => $this->message['chat']['id'],
            'first_name' => $this->message['chat']['first_name'],
            'message_text' => $this->message['text']
        ]);
    }
}
