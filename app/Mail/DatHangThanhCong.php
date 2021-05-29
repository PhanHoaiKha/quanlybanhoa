<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DatHangThanhCong extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.dathangthanhcong')
                            ->from('khaphan1411@gmail.com', 'CookooHouse')
                            ->subject('Xác nhận đặt hàng thành công')
                            ->with([
                                'title' => 'Cảm ơn quý khách đã đặt hàng tại CookooHouse',
                                'content' => 'hihi'
                            ]);
    }
}
