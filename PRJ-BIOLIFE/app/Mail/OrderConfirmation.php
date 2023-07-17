<?php

namespace App\Mail;

use Illuminate\Mail\Mailables\Address;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderConfirmation extends Mailable
{
    use Queueable, SerializesModels;
    // public $data;
    
    public $fullname;
    public $phone;
    public $email;
    public $address;
    public $paymentMethod;
    public $total;
    public $arrayProduct;
    /**
     * Create a new message instance.
     */
    public function __construct($fullname, $phone, $email, $address, $paymentMethod, $total, $arrayProduct)
    {
        // $this->data = $data;
        
        $this->fullname = $fullname;
        $this->phone = $phone;
        $this->email = $email;
        $this->address = $address;
        $this->paymentMethod = $paymentMethod;
        $this->total = $total;
        $this->arrayProduct = $arrayProduct;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('manhnd10803@gmail.com', 'BioLife'),
            subject: 'Successful ordering - BioLife',
        );
    }

     /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.confirmOrder')->with([
            'fullname' => $this->fullname,
            'phone' => $this->phone,
            'email' => $this->email,
            'address' => $this->address,
            'paymentMethod' => $this->paymentMethod,
            'total' => $this->total,
            $this->arrayProduct,
        ]);
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
