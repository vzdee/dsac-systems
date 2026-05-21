<?php

namespace App\Console\Commands;

use App\Mail\AppointmentReminderMail;
use App\Models\Appointment;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendAppointmentReminders extends Command
{
    protected $signature = 'appointments:send-reminders';
    protected $description = 'Send appointment reminders one day before.';

    public function handle(): int
    {
        $windowStart = now()->addDay()->startOfDay();
        $windowEnd = now()->addDay()->endOfDay();

        $appointments = Appointment::query()
            ->whereBetween('scheduled_at', [$windowStart, $windowEnd])
            ->whereNotIn('status', ['Cancelada', 'Completada'])
            ->with(['client.user', 'accountant.user', 'service'])
            ->get();

        if ($appointments->isEmpty()) {
            $this->info('No appointments to remind.');
            return Command::SUCCESS;
        }

        $sentCount = 0;

        foreach ($appointments as $appointment) {
            $email = data_get($appointment, 'client.user.email');

            if (!$email) {
                $this->warn('Appointment ' . $appointment->id . ' has no client email.');
                continue;
            }

            Mail::to($email)->send(new AppointmentReminderMail($appointment));
            $sentCount++;
        }

        $this->info('Sent ' . $sentCount . ' reminder(s).');

        return Command::SUCCESS;
    }
}
