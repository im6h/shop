<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProductPlaces extends Mailable
{
    use Queueable, SerializesModels;

   public $products;
   public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($products,$data)
    {
        $this->products = $products;
        $this->data = $data;
    }
 
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('nguyencuongquyet96@gmail.com')
                    ->view('email.info_product');
                    
    }
}
