<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendStudentPassword extends Notification
{
    use Queueable;

    protected $password;
    /**
     * Create a new notification instance.
     */
    public function __construct($password)
    {
        $this->password = $password;
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
            ->subject('Bienvenue sur la plateforme 🎓')
            ->greeting('Bonjour ' . $notifiable->first_name . ' !')
            ->line('Un compte a été créé pour vous sur la plateforme de gestion des étudiants.')
            ->line('Voici votre mot de passe temporaire : **' . $this->password . '**')
            ->line('Nous vous recommandons de le changer dès votre première connexion.')
            ->action('Se connecter', url('/login'))
            ->line('Bienvenue dans la promo, et bonne chance dans votre parcours !');
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
