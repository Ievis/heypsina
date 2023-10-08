<?php

    namespace App\Http\Controllers;


    class InfoController extends Controller
    {
        public function showOffer()
        {
            return view('info.offer');
        }

        public function showShipment()
        {
            return view('info.shipment');
        }

        public function showConfidentiality()
        {
            return view('info.confidentiality');
        }

        public function showContacts()
        {
            return view('info.contacts');
        }
    }
