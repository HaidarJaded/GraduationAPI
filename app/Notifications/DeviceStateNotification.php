<?php

namespace App\Notifications;

use App\Models\Device;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DeviceStateNotification extends Notification
{
    use Queueable;

    private Device $device;

    /**
     * Create a new notification instance.
     */
    public function __construct(Device $device)
    {
        $this->device = $device;
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
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        $model = $this->device->model;
        $code = $this->device->code;
        $status = $this->device->status;
        $hasOrderPermission = $notifiable->hasPermission($notifiable, 'اضافة طلب')
            && $notifiable->hasPermission($notifiable, 'اضافة طلب لجهاز');
        $existsDelivery=User::getDelivery();
        $canOrder=!is_null($existsDelivery)&&$hasOrderPermission;
        $message = [
            'تحية طيبة سيد ' . $notifiable->name,
            'الجهاز ذات نوع ' . $model,
            'والذي كوده هو ' . $code,
            'في حالة ' . $status,
            'وأصبح قابل للاستلام من قبل حضرتكم. ',
            $canOrder ? 'هل تريد أن نوصله إليك؟' : ''
        ];
        return [
            'title' => 'اشعار بحالة جهاز',
            'body' => $message,
            'Replyable' => $canOrder,
            'data' => [
                'device_id' => $this->device->id
                ,
            ],
            'actions' => $canOrder ? [
                [
                    'title' => 'نعم',
                    'url' => 'api/orders',
                    'method' => 'POST',
                    'request_body' => [
                        'devices_ids' => [
                            $this->device->id => 'تسليم للعميل'
                        ],
                        'client_id' => $this->device->client_id,
                        'description' => 'توصيل جهاز الى العميل'
                    ]
                ],
                [
                    "title" => "لا",
                    'url' => ''
                ]
            ] : []
        ];
    }
}
