<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BookingNotification extends Notification
{
    use Queueable;

    private $nama_bidang;
    private $agenda;
    private $jadwal_akhir;
    private $jadwal_mulai;

    /**
     * Create a new notification instance.
     */ 
    public function __construct($nama_bidang, $agenda, $jadwal_mulai, $jadwal_akhir)
    {
        //
        $this->nama_bidang = $nama_bidang;
        $this->agenda = $agenda;
        $this->jadwal_mulai = $jadwal_mulai;
        $this->jadwal_akhir = $jadwal_akhir;

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
                    ->from('si_ira@example.com', 'SI IRA')
                    ->to
                    ->greeting('Peminjaman Ruangan Baru!')
                    ->line('Berikut adalah detailnya :')
                    ->line('Nama Bidang : ' . $this->nama_bidang)
                    ->line('Agenda : ' . $this->agenda)
                    ->line('Jadwal : ' . $this->jadwal_mulai . '-'. $this->jadwal_akhir)
                    // ->action('Notification Action', url('/'))
                    ->line('Terima Kasih !');
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
