<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateCustomersTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('customers', function (Blueprint $table) {
                $table->id();
                $table->string('city')->nullable();
                $table->string('address')->nullable();
                $table->string('house_number')->nullable();
                $table->string('index')->nullable();
                $table->string('name');
                $table->string('surname');
                $table->string('patronymic');
                $table->string('phone_number');
                $table->string('email');
                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::dropIfExists('customers');
        }
    }
