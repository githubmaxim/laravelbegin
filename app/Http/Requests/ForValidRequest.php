<?php
declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ForValidRequest extends FormRequest
{

//    !!!! Если нам нужен вывод ошибок не на языке по умолчанию (english), а любом другом, то нам необходимо:
// 1. Командой "php artisan lang:publish" создать папку "lang" и подпапку "en"
// 2. В папку "lang" скопировать еще раз подпапку "en" и переназвать ее по необходимому языку (например "ru")
// 3. Найти в интернете файл "validation.php" на необходимом языке и заменить его в нашей подпапке или
//    зайти в файл "validation.php" и для нужных ошибок ввода вручную переписать тест сообщения
// 4. В файле “.env” заменить “APP_LOCALE=en” на “APP_LOCALE=ru”.

    public function rules()
    {
//        return [
//            'title' => ['required', 'max:2'],
//            'content' => ['required', 'max:2', 'unique:for_valids'],
//            'status' => ['nullable', 'max:2', 'integer'],
//            'for_valid_mains_id' => ['required', 'exists:for_valid_mains,id']
//        ];

        //!! Если нам нужно детализировать еще и по методу ввода информации GET/POST/DELETE и т.д., то нужно писать так:
        $rules = [
            'title' => 'required | max:2',
            'content' => 'required | max:2 | unique:for_valids',
            'status' => 'nullable | max:2 | integer',
            'for_valid_mains_id' => 'required | exists:for_valid_mains,id'
        ];

        switch ($this->getMethod())
        {
            case 'POST':
                return $rules;
            case 'PUT':
                return [
                        'for_valid_mains_id' => 'required|integer|exists:for_valid_mains, id', //должен существовать. Можно вот так: unique:games,id,' . $this->route('game'),
                        'title' => [
                            'required',
                            Rule::unique('for_valid_mains')->ignore($this->title, 'title') //должен быть уникальным, за исключением себя же
                        ]
                    ] + $rules; // и берем все остальные правила
            // case 'PATCH':
            case 'DELETE':
                return [
                    'game_id' => 'required|integer|exists:games,id'
                ];
        }
    }


    //Метод собственного, а не стандартного (по умолчанию или находящегося в папке "lang/en" или "lang/ru"
    // и т.д.) выводимого текста при выводе ошибок ввода
    public function messages(): array
    {
        return [
//        текст, который будет показываться, для всех 'required' и 'max' пойманных у любых переменных
//            'required'=>':attribute This title field is required.',
//            'max'=>':attribute Maximum length is :max.',

//        текст, который будет показываться, для 'required' пойманного только у переменной "title"
            'title.required'=>':attribute This title field is required.',
        ];
    }


    // "return true" пишется если на сайте нет авторизации
    public function authorize(): bool
    {
        return true;
    }
}
