<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BookingVerified extends Notification
{
    use Queueable;

    protected $booking;


    public function __construct($booking)
    {
        $this->booking=$booking;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject("Booking Verification:")
            ->greeting('Hello '. $notifiable->name . ',')
            ->line('Your Booking( Name: '. $this->booking->name . ') has been verified, and the service provider has been assigned')
            ->action('View Booking', url('/user/bookings/' . $this->booking->id))
            ->line('Thank you for choosing. Please proceed to payment!');
    }

    //to database
    public function toDatabase($notifiable)
    {
        return [
            'booking_id' => $this->booking->id,
            'message' => 'Your booking has been verified.',
            'url' => '/user/bookings/' . $this->booking->id,
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [

            'booking'=>$this->booking ,
        ];
    }
}
