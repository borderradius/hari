<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticlesRequest extends FormRequest
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
            'title' => ['required'],
            'content' => ['required', 'min:10'],
        ];
    }

    /**
     * 유효성검사시 오류내용 전달 메시지
     */
    public function messages()
    {
        return [
            'title.required' => ':attribute은 필수 입력 항목입니다.',
            'content.required' => ':attribute은 필수 입력 항목입니다.',
            'content.min' => ':attribute은 최소 :min 글자 이상이 필요합니다.',
        ];
    }

    public function attributes()
    {
        return [
            'title' => '제목',
            'content' => '본문',
        ];
    }
}
