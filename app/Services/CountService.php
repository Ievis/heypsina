<?php

    namespace App\Services;

    class CountService
    {
        public static function countAllProducts($orders)
        {
            $count = 0;
            foreach ($orders as $order) $count += self::countProducts($order);
        }

        public static function countProducts($order)
        {
            return $order->withSum('products', 'count')->get();
        }
    }
