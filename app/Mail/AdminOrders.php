<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdminOrders extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $full_name;
    protected $email;
    protected $address;
    protected $city;
    protected $phone;
    protected $payment;
    protected $info;

    public function __construct($full_name,$email,$address,$city,$phone,$payment,$info)
    {
        $this->full_name = $full_name;
        $this->email=$email;
        $this->address=$address;
        $this->city=$city;
        $this->phone=$phone;
        $this->payment=$payment;
        $this->info=$info;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Admin Orders',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'emails.adminorders',
            with: [
                'Name' => $this->full_name,
                'Email' => $this->email,
                'Address'=>$this->address,
                'City'=>$this->city,
                'Phone'=>$this->phone,
                'Payment'=>$this->payment,
                'Info'=>$this->info
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
