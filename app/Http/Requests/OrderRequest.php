<?php

    namespace App\Http\Requests;

    use Illuminate\Foundation\Http\FormRequest;

    class OrderRequest extends FormRequest
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
                'name' => 'required|max:255',
                'surname' => 'required|max:255',
                'patronymic' => 'required|max:255',
                'phone_number' => 'required|max:255',
                'email' => 'email|required|max:255',
                'city_option' => 'required|max:255',
                'city' => 'required_unless:city_option,=,Владивосток|max:255',
                'address' => 'required_unless:city_option,=,Владивосток|max:255',
                'house_number' => 'required_unless:city_option,=,Владивосток|max:255',
                'index' => 'required_unless:city_option,=,Владивосток|max:255',
                'comment' => 'nullable|max:255'
            ];
        }

        public function messages()
        {
            return [
                '*.max' => 'Каждое поле требует не более 255 символов',
                'name.required' => 'Введите Ваше имя',
                'surname.required' => 'Введите Вашу фамилию',
                'patronymic.required' => 'Введите Ваше отчество',
                'city_option.required' => 'Выберите Ваш город',
                'city.required_unless' => 'Введите Ваш город',
                'email.required' => 'Введите Ваш электронный адрес',
                'email.email' => 'Введите Ваш электронный адрес',
                'phone_number.required' => 'Введите Ваш номер телефона',
                'address.required_unless' => 'Введите Ваш адрес',
                'house_number.required_unless' => 'Введите Ваш номер дома',
                'index.required_unless' => 'Введите Ваш почтовый индекс'
            ];
        }
    }
