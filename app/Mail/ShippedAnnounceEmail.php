<?php

    namespace App\Mail;

    use Illuminate\Bus\Queueable;
    use Illuminate\Contracts\Queue\ShouldQueue;
    use Illuminate\Mail\Mailable;
    use Illuminate\Queue\SerializesModels;

    class ShippedAnnounceEmail extends Mailable
    {
        use Queueable, SerializesModels;

        private $order;
        private $track;
        private $customer;

        /**
         * Create a new message instance.
         *
         * @return void
         */
        public function __construct($order)
        {
            $this->order = $order;
            $this->customer = $order->customer()->first();
            $this->track = $order->shipped_order()->first()->track_number;
        }

        /**
         * Build the message.
         *
         * @return $this
         */
        public function build()
        {
            return $this->view('mail.shipped', [
                'order' => $this->order,
                'track' => $this->track,
                'customer' => $this->customer
            ])
                ->subject('Доставка HEYPS!NA');
        }
    }
