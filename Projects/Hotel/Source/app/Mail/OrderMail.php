<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Seo;
use DB;
class OrderMail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;

    /** 
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
       $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $seo = Seo::first();

        $order = $this->data;
        return $this->from($seo->meta_email)->view('frontend.body.mail',compact('order'))->subject('Email From Hotel');
    }
}
