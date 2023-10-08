<?php

    namespace Database\Seeders;

    use App\Models\Admin;
    use App\Models\Photo;
    use Illuminate\Database\Seeder;
    use Illuminate\Support\Facades\Hash;

    class ImagesSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            $images = [
                'media/1.webp',
                'media/2.webp',
                'media/3.webp',
            ];

            foreach ($images as $image) {
                Photo::create([
                    'url' => $image
                ]);
            }

            Admin::create([
                'login' => 'admin',
                'password' => Hash::make('212eb6f0-bbe0-48fc-9e79-907ddf4c9b68')
            ]);
        }
    }
