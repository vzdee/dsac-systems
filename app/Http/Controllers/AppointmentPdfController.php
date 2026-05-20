<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Services\AppointmentPdfService;

class AppointmentPdfController extends Controller
{
    public function download(Appointment $appointment, AppointmentPdfService $pdfService)
    {
        return $pdfService->download($appointment);
    }
}