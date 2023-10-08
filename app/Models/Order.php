<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;

    class Order extends Model
    {
        use HasFactory, SoftDeletes;

        protected $guarded = [];

        public function products()
        {
            return $this->hasMany(OrderedProduct::class);
        }

        public function shipped_order()
        {
            return $this->hasOne(ShippedOrder::class);
        }

        public function customer()
        {
            return $this->belongsTo(Customer::class);
        }
    }
