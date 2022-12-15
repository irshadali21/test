<?php
/*
 * File name: NewMessage.php
 * Last modified: 2021.11.01 at 22:25:44

 * Copyright (c) 2021
 */

namespace App\Notifications;

use App\Models\User;
use Benwilkins\FCM\FcmMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewMessage extends Notification
{
    use Queueable;

    /**  @var User */
    private $user;

    /** @var string */
    private $text;

    /** @var string */
    private $messageId;


    /**
     * Create a new notification instance.
     *
     * @param User $user
     * @param string $text
     * @param string $messageId
     */
    // public function __construct(User $user, string $text, string $messageId)
    // {
    //     $this->user = $user;
    //     $this->text = $text;
    //     $this->messageId = $messageId;
    // }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return MailMessage
     */
    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->mailer('smtp')
            ->line('The introduction to the notification.');
    }

    

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable): array
    {
        return [
            // 'from' => $this->user->name,
            // 'message_id' => $this->messageId,
        ];
    }
}
