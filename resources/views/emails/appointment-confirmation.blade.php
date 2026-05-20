<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Confirmación de Cita Fiscal</title>

    <style>
        @page {
            margin: 35px 45px;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            color: #111;
            font-size: 13px;
            line-height: 1.6;
        }

        .doc {
            max-width: 760px;
            margin: 0 auto;
            background: #fff;
            padding: 52px 56px;
            position: relative;
        }

        .top-bar {
            height: 3px;
            background: #111;
            margin-bottom: 48px;
            position: relative;
        }

        .top-bar-accent {
            position: absolute;
            right: 0;
            top: 0;
            height: 3px;
            width: 80px;
            background: #B0393F;
        }

        .doc-header {
            display: table;
            width: 100%;
            margin-bottom: 44px;
        }

        .doc-header-l,
        .doc-header-r {
            display: table-cell;
            vertical-align: bottom;
        }

        .doc-header-r {
            text-align: right;
        }

        .doc-logo img {
            height: 44px;
            width: auto;
        }

        .doc-title {
            font-size: 11px;
            font-weight: bold;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: #111;
            margin: 0 0 4px;
        }

        .doc-date {
            font-size: 11px;
            color: #999;
        }

        .intro {
            font-size: 13px;
            color: #555;
            line-height: 1.8;
            margin-bottom: 40px;
            padding-bottom: 28px;
            border-bottom: 1px solid #e5e5e5;
        }

        .intro strong {
            color: #111;
            font-weight: bold;
        }

        .grid {
            display: table;
            width: 100%;
            margin-bottom: 36px;
        }

        .grid-col {
            display: table-cell;
            vertical-align: top;
            width: 50%;
        }

        .grid-col-left {
            padding-right: 20px;
        }

        .grid-col-right {
            padding-left: 20px;
        }

        .block {
            margin-bottom: 28px;
        }

        .block-label {
            font-size: 9px;
            font-weight: bold;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            color: #B0393F;
            margin-bottom: 12px;
            padding-bottom: 8px;
            border-bottom: 1px solid #e5e5e5;
        }

        .field {
            margin-bottom: 14px;
        }

        .field-key {
            font-size: 10px;
            letter-spacing: 0.5px;
            color: #999;
            text-transform: uppercase;
            margin-bottom: 3px;
        }

        .field-val {
            font-size: 13px;
            color: #111;
        }

        .field-val-accent {
            color: #B0393F;
            font-weight: bold;
        }

        .status-pill {
            display: inline-block;
            font-size: 10px;
            font-weight: bold;
            letter-spacing: 1px;
            text-transform: uppercase;
            padding: 3px 10px;
            border: 1px solid #111;
            color: #111;
        }

        .notice {
            margin: 0 0 36px;
            padding: 18px 20px;
            border-left: 2px solid #B0393F;
            background: #fafafa;
        }

        .notice-label {
            font-size: 9px;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: #B0393F;
            font-weight: bold;
            margin-bottom: 6px;
        }

        .notice-text {
            font-size: 12px;
            color: #555;
            line-height: 1.7;
        }

        .sig {
            margin-top: 40px;
        }

        .sig-subtle {
            font-size: 12px;
            color: #999;
            margin: 0 0 3px;
        }

        .sig-name {
            font-size: 13px;
            color: #111;
            font-weight: bold;
            margin: 0 0 3px;
        }

        .sig-company {
            font-size: 11px;
            color: #bbb;
        }

        .bottom-bar {
            margin-top: 44px;
            display: table;
            width: 100%;
            border-top: 1px solid #e5e5e5;
            padding-top: 14px;
        }

        .bottom-bar-l,
        .bottom-bar-r {
            display: table-cell;
            vertical-align: middle;
        }

        .bottom-bar-r {
            text-align: right;
        }

        .bottom-bar p {
            font-size: 10px;
            color: #bbb;
            margin: 0;
        }
    </style>
</head>

<body>

    <div class="doc">

        <div class="top-bar">
            <div class="top-bar-accent"></div>
        </div>

        <div class="doc-header">
            <div class="doc-header-l doc-logo">
                <x-application-mark class="block h-16 w-16" />
            </div>
            <div class="doc-header-r">
                <p class="doc-title">Confirmación de Cita Fiscal</p>
                <p class="doc-date">Generado el {{ now()->format('d/m/Y') }}</p>
            </div>
        </div>

        <div class="intro">
            Se confirma la cita fiscal programada para el cliente
            <strong>{{ $appointment->client->name ?? 'Cliente' }}</strong>.
            Este documento deja constancia de la fecha, horario y datos generales relacionados con la atención
            solicitada.
        </div>

        <div class="grid">
            <div class="grid-col grid-col-left">

                <div class="block">
                    <div class="block-label">Datos de la cita</div>
                    <div class="field">
                        <div class="field-key">N.° de cita</div>
                        <div class="field-val">#{{ $appointment->id ?? 'N/A' }}</div>
                    </div>
                    <div class="field">
                        <div class="field-key">Fecha programada</div>
                        <div class="field-val">
                            {{ \Carbon\Carbon::parse($appointment->scheduled_at)->format('d M Y — h:i A') }}
                        </div>
                    </div>
                    <div class="field">
                        <div class="field-key">Tipo de servicio</div>
                        <div class="field-val">{{ $appointment->service->name ?? 'Servicio fiscal' }}</div>
                    </div>
                    <div class="field">
                        <div class="field-key">Total a pagar</div>
                        <div class="field-val field-val-accent">$ {{ $appointment->service->price ?? 0 }} MXN</div>
                    </div>
                    <div class="field">
                        <div class="field-key">Estado</div>
                        <div class="field-val">
                            <span class="status-pill">{{ ucfirst($appointment->status ?? 'confirmada') }}</span>
                        </div>
                    </div>
                </div>

            </div>

            <div class="grid-col grid-col-right">

                <div class="block">
                    <div class="block-label">Datos del cliente</div>
                    <div class="field">
                        <div class="field-key">Nombre</div>
                        <div class="field-val">
                            {{ $appointment->client->user->name . ' ' . $appointment->client->user->last_name ?? 'N/A' }}
                        </div>
                    </div>
                    <div class="field">
                        <div class="field-key">Correo electrónico</div>
                        <div class="field-val">{{ $appointment->client->user->email ?? 'N/A' }}</div>
                    </div>
                    <div class="field">
                        <div class="field-key">Teléfono</div>
                        <div class="field-val">{{ $appointment->client->user->phone_number ?? 'N/A' }}</div>
                    </div>
                </div>

                @if (!empty($appointment->accountant))
                    <div class="block">
                        <div class="block-label">Empleado asignado</div>
                        <div class="field">
                            <div class="field-key">Nombre</div>
                            <div class="field-val">
                                {{ $appointment->accountant->user->name . ' ' . $appointment->accountant->user->last_name ?? 'Pendiente por asignar' }}
                            </div>
                        </div>
                        <div class="field">
                            <div class="field-key">Correo electrónico</div>
                            <div class="field-val">{{ $appointment->accountant->user->email ?? 'N/A' }}</div>
                        </div>
                    </div>
                @endif

            </div>
        </div>

        {{-- Si no hay empleado asignado, se muestra debajo a la izquierda --}}
        @if (empty($appointment->accountant))
            <div style="width: 50%; padding-right: 20px; margin-bottom: 36px;">
                <div class="block">
                    <div class="block-label">Empleado asignado</div>
                    <div class="field">
                        <div class="field-key">Estado</div>
                        <div class="field-val">Pendiente por asignar</div>
                    </div>
                </div>
            </div>
        @endif

        <div class="notice">
            <div class="notice-label">Nota importante</div>
            <div class="notice-text">
                Se recomienda presentarse con la documentación necesaria para la atención fiscal correspondiente.
                En caso de no poder asistir, favor de comunicarse con anticipación para reagendar la cita.
            </div>
        </div>

        <div class="sig">
            <p class="sig-subtle">Atentamente,</p>
            <p class="sig-name">Departamento de Atención Fiscal</p>
            <p class="sig-company">DSAC Systems</p>
        </div>

        <div class="bottom-bar">
            <div class="bottom-bar-l">
                <p>Documento generado electrónicamente — no requiere firma.</p>
            </div>
            <div class="bottom-bar-r">
                <p>DSAC Systems &copy; {{ now()->year }}</p>
            </div>
        </div>

    </div>

</body>

</html>
