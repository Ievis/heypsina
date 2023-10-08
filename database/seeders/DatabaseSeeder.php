<?php

    namespace Database\Seeders;

    use App\Models\Admin;
    use App\Models\Customer;
    use App\Models\Order;
    use App\Models\OrderedProduct;
    use App\Models\Photo;
    use Illuminate\Database\Seeder;
    use Illuminate\Support\Facades\Hash;

    class DatabaseSeeder extends Seeder
    {
        /**
         * Seed the application's database.
         *
         * @return void
         */
        public function run()
        {
            $customers = Customer::factory()->count(100)->create();
            foreach ($customers as $customer) {
                $order = Order::factory()
                    ->has(OrderedProduct::factory()->count(3), 'products')
                    ->create();

                $products = $order->products()->get();

                $price = ($order->customer()->first()->city == 'Владивосток') ? 0 : 299;
                foreach ($products as $product) {
                    $price = $price + 2190 * $product->count;
                }

                $order->customer_id = $customer->id;
                $order->amount = $price;
                $order->save();
            }

        }
    }
