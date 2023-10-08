<?php

    namespace Database\Factories;

    use App\Models\Order;
    use App\Models\OrderedProduct;
    use Illuminate\Database\Eloquent\Factories\Factory;
    use Illuminate\Support\Arr;
    use Illuminate\Support\Carbon;

    class OrderedProductFactory extends Factory
    {
        /**
         * Define the model's default state.
         *
         * @return array
         */
        public function definition()
        {
            $colors = [
                ['media/1.webp' => 'Зелёный'],
                ['media/2.webp' => 'Розовый'],
                ['media/3.webp' => 'Белый'],
            ];
            $sizes = ['S', 'M', 'L', 'XL', 'XXL', 'XXXL'];

            $color = Arr::random($colors);
            $image = array_key_first($color);
            $color = $color[$image];
            $size = Arr::random($sizes);
            $count = rand(1, 3);

            return [
                'color' => $color,
                'order_id' => Order::factory(),
                'size' => $size,
                'count' => $count,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'image' => $image
            ];
        }
    }
