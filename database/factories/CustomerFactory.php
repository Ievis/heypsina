<?php

    namespace Database\Factories;

    use Carbon\Carbon;
    use Illuminate\Database\Eloquent\Factories\Factory;
    use Illuminate\Support\Arr;

    class CustomerFactory extends Factory
    {
        /**
         * Define the model's default state.
         *
         * @return array
         */
        public function definition()
        {
            $cities = ['Владивосток', 'Москва'];
            $emails = ['larzyakov@mail.ru', 'vlad.beliy.seo@gmail.com', 'sdjfodjflksdjk123132fdskljfsd@hueil.ru'];
            $city = Arr::random($cities);
            $email = Arr::random($emails);

            return [
                'city' => $city,
                'address' => '123',
                'house_number' => '123',
                'index' => '123',
                'name' => '123',
                'surname' => '123',
                'patronymic' => '123',
                'phone_number' => '123',
                'email' => $email,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];
        }
    }
