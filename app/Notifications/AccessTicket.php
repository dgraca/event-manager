<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AccessTicket extends Notification
{
    use Queueable;

    private string $pdfContent;
    private string $pdfName;

    /**
     * Create a new notification instance.
     */
    public function __construct(string $pdfContent, string $pdfName)
    {
        $this->pdfContent = $pdfContent;
        $this->pdfName = $pdfName;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject(__('Access Ticket') . ' - ' . config('app.name'))
            ->line(__('Your access ticket is attached.'))
            ->attachData($this->pdfContent, $this->pdfName, [
                'mime' => 'application/pdf',
            ])
            ->line(__('Thank you for using our application!'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
