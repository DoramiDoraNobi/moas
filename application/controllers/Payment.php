<?php 
class Payment extends CI_Controller 
{
    public function index(){
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-URqAE-mmZhRggYfdVCGA-f73';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => 10000,
            )
        );

        $data = array(
            'snap_token' => \Midtrans\Snap::getSnapToken($params)
        )

        $this->load->view('checkout', $data);
    }
}

?>