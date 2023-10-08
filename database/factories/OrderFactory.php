<?php

    namespace Database\Factories;

    use App\Services\RandomService;
    use Illuminate\Database\Eloquent\Factories\Factory;
    use Illuminate\Support\Arr;
    use Illuminate\Support\Carbon;
    use Illuminate\Support\Str;

    class OrderFactory extends Factory
    {
        /**
         * Define the model's default state.
         *
         * @return array
         */
        public function definition()
        {
            return [
                'order_id' => Str::random(10),
                'comment' => $this->faker->sentence,
                'customer_id' => 1,
                'status' => 'succeeded',
                'delivery' => 'Waiting for shipment',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'amount' => 2190,
                'is_emailed' => true,
                'session_id' => RandomService::v4()
            ];
        }
    }
