<?php

namespace App\Services;

use Exception;

class Ipaymu
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function make()
    {
        $url = 'https://my.ipaymu.com/payment.htm';  // URL Payment iPaymu           
        $params = array(   // Prepare Parameters            
            'key'      => config('ipaymu.api_key'), // API Key Merchant / Penjual
            'action'   => 'payment',
            'product'  => $this->data['product'],
            'price'    => $this->data['price'], // Total Harga
            'quantity' => $this->data['quantity'],
            'comments' => $this->data['comments'], // Optional
            'ureturn'  => 'http://websiteanda.com/return.php?q=return',
            'unotify'  => 'http://websiteanda.com/notify.php',
            'ucancel'  => 'http://websiteanda.com/cancel.php',
        
            /* Parameter tambahan untuk pembayaran COD
            * ----------------------------------------------- */
            // 'weight'     => '0.5', // Berat barang (satuan kilo)
            // 'dimensi'    => '1:2:1', // Dimensi barang (format => panjang:lebar:tinggi)
            // 'postal_code'=> '82131',  // Kode pos untuk custom pikcup
            // 'address'    => 'Jalan Raya Kuta, No 88R, Badung, Bali' // Alamat untuk custom pickup
            /* ----------------------------------------------- */
        
            /* Parameter tambahan untuk custom payment page (hanya menampilkan satu metode pembayaran)
            * ----------------------------------------------- */
            // 'pay_method'  => 'cstore', // Metode pembayaran yang akan ditampilkan (VA Niaga => niaga, VA BNI => bni, Kartu Kredit => cc, Convenience Store (Alfamart/Indomaret) => cstore, COD => cod, Saldo iPaymu => member)
            // 'pay_channel' => 'indomaret' // Channel dari metode pembayaran, jika ada (Misal dari metode pembayaran Convenience Store => indomaret, alfamart)
            // 'buyer_name'  => 'Agus', // Nama pembeli(opsional) 
            // 'buyer_phone' => '08123456789', // No HP pembeli (opsional)
            // 'buyer_email' => 'pembeli@mail.com', // Email pembeli (opsional)
            /* ----------------------------------------------- */
        
            'format'   => 'json' // Format: xml atau json. Default: xml
            );
        
        $params_string = http_build_query($params);
        
        //open connection
        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, count($params));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        
        //execute post
        $request = curl_exec($ch);
        
        if ( $request === false ) {
            throw new Exception('Curl Error: ' . curl_error($ch));
        } else {
        
            $result = json_decode($request, true);
        
            if( isset($result['url']) )
                return $result['url'];
            else {
                dd($result);
                throw new Exception("Error ". $result['Status'] .":". $result['Keterangan']);
            }
        }
        
        //close connection
        curl_close($ch);
    }
}