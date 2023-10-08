<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateOrdersTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('orders', function (Blueprint $table) {
                $table->id();
                $table->string('order_id');
                $table->unsignedBigInteger('customer_id');
                $table
                    ->foreign('customer_id')
                    ->references('id')
                    ->on('customers')
                    ->onDelete('cascade');
                $table->unsignedBigInteger('amount');
                $table->boolean('is_emailed')->default(false);
                $table->string('status');
                $table->string('delivery')->default('Waiting for payment');
                $table->string('session_id');
                $table->string('comment')->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::dropIfExists('orders');
        }
    }
