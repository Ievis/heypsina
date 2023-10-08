<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateFailedOrdersTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('failed_orders', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('order_id');
                $table
                    ->foreign('order_id')
                    ->references('id')
                    ->on('orders')
                    ->onDelete('cascade');
                $table->string('track_number');
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
            Schema::dropIfExists('failed_orders');
        }
    }
