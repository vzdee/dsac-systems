@extends('emails.layout')

@php
	$clientName = trim((string) data_get($appointment, 'client.user.name', '') . ' ' . data_get($appointment, 'client.user.last_name', ''));
	$clientName = $clientName !== '' ? $clientName : 'Cliente';
	$scheduledAt = $appointment->scheduled_at
		? $appointment->scheduled_at->format('d M Y - h:i A')
		: 'N/A';
@endphp

@section('title', 'Actualizacion de cita fiscal')
@section('heading', 'Actualizacion de cita fiscal')

@section('intro')
	Hola <strong>{{ $clientName }}</strong>, los datos de tu cita fiscal fueron actualizados. La fecha actual es
	<strong>{{ $scheduledAt }}</strong>.
@endsection

@section('content')
	@include('emails.partials.appointment-details', [
		'appointment' => $appointment,
		'showClient' => false,
		'showPrice' => true,
		'showStatus' => true,
		'showAccountant' => true,
	])

	<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="margin-top: 20px;">
		<tr>
			<td style="padding: 14px 16px; background-color: #faf6f6; border-left: 3px solid #B0393F;">
				<p style="margin: 0; font-size: 13px; line-height: 1.6; color: #555;">
					Si no reconoces esta actualizacion, responde a este correo y revisamos el cambio contigo.
				</p>
			</td>
		</tr>
	</table>
@endsection
