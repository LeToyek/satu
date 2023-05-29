<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CampaignFullyFunded extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    protected $campaign;
    public function __construct($campaign)
    {
        //
        $this->campaign = $campaign;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
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
            'campaign_name' => $this->campaign->title,
            'slug' => $this->campaign->slug,
            'campaign_image' => $this->campaign->images[0]->path,
            'message' => 'Kampanye dengan nama ' . $this->campaign->title . ' telah terdanai secara penuh!'
        ];
    }
}
