<?php

namespace App\Listeners;

use App\Events\AppointmentUpdated;
use App\Mail\AppointmentUpdatedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendAppointmentUpdatedEmail implements ShouldQueue
{
    public function handle(AppointmentUpdated $event): void
    {
        $appointment = $event->appointment->load('client.user', 'accountant.user', 'service');
        $email = data_get($appointment, 'client.user.email');

        if (! $email) {
            return;
        }

        Mail::to($email)->send(new AppointmentUpdatedMail($appointment));
    }
}
