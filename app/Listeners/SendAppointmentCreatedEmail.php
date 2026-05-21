<?php

namespace App\Listeners;

use App\Events\AppointmentCreated;
use App\Mail\AppointmentCreatedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendAppointmentCreatedEmail implements ShouldQueue
{
    public function handle(AppointmentCreated $event): void
    {
        $appointment = $event->appointment->load('client.user', 'accountant.user', 'service');
        $email = data_get($appointment, 'client.user.email');

        if (! $email) {
            return;
        }

        Mail::to($email)->send(new AppointmentCreatedMail($appointment));
    }
}
