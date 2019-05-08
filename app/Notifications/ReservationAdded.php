<?php

namespace App\Notifications;

use Carbon\Carbon;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ReservationAdded extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * The Message will be appear at the notification
     *
     * @var string
     */
    public $message;

    /**
     * The Time that the user added on
     *
     * @var string
     */
    public $time;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->message  = 'New Reservation Added';
        // $this->time     = $this->created_at->diffForHumans();
        $this->time     = Carbon::now();
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'broadcast'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'message'   => $this->message,
            'time'      => $this->time
        ];
    }

    /**
     * Get the broadcastable representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return BroadcastMessage
     */
    public function toBroadcast($notifiable)
    {
        return [
            'message'   => $this->message,
            'time'      => $this->time->diffForHumans()
        ];
    }
}
