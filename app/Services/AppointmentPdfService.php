<?php

namespace App\Services;

use App\Models\Appointment;
use Barryvdh\DomPDF\Facade\Pdf;

class AppointmentPdfService
{
    public function make(Appointment $appointment)
    {
        $appointment->load([
            'client.user',
            'accountant.user',
            'service',
        ]);

        return Pdf::loadView('emails.appointment-confirmation', [
            'appointment' => $appointment,
        ])->setPaper('letter');
    }

    public function download(Appointment $appointment)
    {
        $pdf = $this->make($appointment);

        return $pdf->download('cita-' . $appointment->id . '.pdf');
    }

    public function output(Appointment $appointment)
    {
        return $this->make($appointment)->output();
    }
}