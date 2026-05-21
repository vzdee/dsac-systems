@php
    $showPrice = $showPrice ?? true;
    $showStatus = $showStatus ?? true;
    $showClient = $showClient ?? false;
    $showAccountant = $showAccountant ?? true;

    $clientName = trim((string) data_get($appointment, 'client.user.name', '') . ' ' . data_get($appointment, 'client.user.last_name', ''));
    $clientEmail = data_get($appointment, 'client.user.email');
    $clientPhone = data_get($appointment, 'client.user.phone_number');

    $accountantName = trim((string) data_get($appointment, 'accountant.user.name', '') . ' ' . data_get($appointment, 'accountant.user.last_name', ''));
    $accountantEmail = data_get($appointment, 'accountant.user.email');

    $scheduledAt = $appointment->scheduled_at
        ? $appointment->scheduled_at->format('d M Y - h:i A')
        : 'N/A';
    $serviceName = data_get($appointment, 'service.name', 'Servicio fiscal');
    $price = number_format((float) data_get($appointment, 'price', data_get($appointment, 'service.price', 0)), 2);
    $status = data_get($appointment, 'status', 'Pendiente');
@endphp

<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
    <tr>
        <td colspan="2"
            style="padding: 12px 0 8px; font-size: 11px; text-transform: uppercase; letter-spacing: 1px; color: #B0393F; font-weight: 700; border-bottom: 1px solid #eee;">
            Detalles de la cita
        </td>
    </tr>
    <tr>
        <td style="padding: 10px 0; font-size: 12px; color: #999; width: 45%;">N.° de cita</td>
        <td style="padding: 10px 0; font-size: 13px; color: #111;">#{{ $appointment->id ?? 'N/A' }}</td>
    </tr>
    <tr>
        <td style="padding: 10px 0; font-size: 12px; color: #999;">Fecha y hora</td>
        <td style="padding: 10px 0; font-size: 13px; color: #111;">{{ $scheduledAt }}</td>
    </tr>
    <tr>
        <td style="padding: 10px 0; font-size: 12px; color: #999;">Servicio</td>
        <td style="padding: 10px 0; font-size: 13px; color: #111;">{{ $serviceName }}</td>
    </tr>
    @if ($showPrice)
        <tr>
            <td style="padding: 10px 0; font-size: 12px; color: #999;">Total a pagar</td>
            <td style="padding: 10px 0; font-size: 13px; color: #B0393F; font-weight: 700;">$ {{ $price }} MXN</td>
        </tr>
    @endif
    @if ($showStatus)
        <tr>
            <td style="padding: 10px 0; font-size: 12px; color: #999;">Estado</td>
            <td style="padding: 10px 0; font-size: 13px; color: #111;">{{ $status }}</td>
        </tr>
    @endif
</table>

@if ($showAccountant)
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; margin-top: 18px;">
        <tr>
            <td colspan="2"
                style="padding: 12px 0 8px; font-size: 11px; text-transform: uppercase; letter-spacing: 1px; color: #B0393F; font-weight: 700; border-bottom: 1px solid #eee;">
                Empleado asignado
            </td>
        </tr>
        <tr>
            <td style="padding: 10px 0; font-size: 12px; color: #999; width: 45%;">Nombre</td>
            <td style="padding: 10px 0; font-size: 13px; color: #111;">
                {{ $accountantName !== '' ? $accountantName : 'Pendiente por asignar' }}
            </td>
        </tr>
        @if ($accountantEmail)
            <tr>
                <td style="padding: 10px 0; font-size: 12px; color: #999;">Correo electronico</td>
                <td style="padding: 10px 0; font-size: 13px; color: #111;">{{ $accountantEmail }}</td>
            </tr>
        @endif
    </table>
@endif

@if ($showClient)
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; margin-top: 18px;">
        <tr>
            <td colspan="2"
                style="padding: 12px 0 8px; font-size: 11px; text-transform: uppercase; letter-spacing: 1px; color: #B0393F; font-weight: 700; border-bottom: 1px solid #eee;">
                Datos del cliente
            </td>
        </tr>
        <tr>
            <td style="padding: 10px 0; font-size: 12px; color: #999; width: 45%;">Nombre</td>
            <td style="padding: 10px 0; font-size: 13px; color: #111;">
                {{ $clientName !== '' ? $clientName : 'N/A' }}
            </td>
        </tr>
        @if ($clientEmail)
            <tr>
                <td style="padding: 10px 0; font-size: 12px; color: #999;">Correo electronico</td>
                <td style="padding: 10px 0; font-size: 13px; color: #111;">{{ $clientEmail }}</td>
            </tr>
        @endif
        @if ($clientPhone)
            <tr>
                <td style="padding: 10px 0; font-size: 12px; color: #999;">Telefono</td>
                <td style="padding: 10px 0; font-size: 13px; color: #111;">{{ $clientPhone }}</td>
            </tr>
        @endif
    </table>
@endif
