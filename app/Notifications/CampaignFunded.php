<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CampaignFunded extends Notification
{
    use Queueable;

    protected $funding;

    /**
     * Create a new notification instance.
     */
    public function __construct($funding)
    {
        //
        $this->funding = $funding;
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
     * @return array<string, mixed
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
            'campaign_name' => $this->funding->campaign->title,
            'slug' => $this->funding->campaign->slug,
            'funder_name' => $this->funding->user->name,
            'funder_avatar' => $this->funding->user->avatar_url,
            'campaign_image' => $this->funding->campaign->images[0]->path,
            'message' => $this->funding->user->name . ' telah mendanai ' . $this->funding->campaign->title . ' sebesar Rp ' . number_format($this->funding->fund_nominal,0,',','.') . ', jangan lupa untuk melakukan claim dan mengucapkan terima kasih!'
        ];
    }
}
