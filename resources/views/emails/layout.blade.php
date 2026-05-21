<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'DSAC Systems')</title>
</head>

<body style="margin: 0; padding: 0; background-color: #f6f4f2;">
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color: #f6f4f2; padding: 24px 0;">
        <tr>
            <td align="center">
                <table role="presentation" width="100%" cellpadding="0" cellspacing="0"
                    style="width: 100%; max-width: 640px; background-color: #ffffff; border: 1px solid #eee; border-collapse: collapse;">
                    <tr>
                        <td>
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td width="80%" bgcolor="#111111" style="height: 4px; line-height: 4px;">&nbsp;</td>
                                    <td width="20%" bgcolor="#B0393F" style="height: 4px; line-height: 4px;">&nbsp;</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 24px 32px 12px;">
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td align="left" valign="middle">
                                        <img src="https://res.cloudinary.com/dxsufvxeu/image/upload/v1776494039/test1_efvniy.png"
                                            alt="Logo DSAC" style="height: 48px; width: auto; display: block;">
                                    </td>
                                    <td align="right" valign="middle"
                                        style="color: #999; font-size: 12px; font-family: Arial, sans-serif;">
                                        {{ now()->format('d/m/Y') }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 0 32px 28px; font-family: Arial, sans-serif;">
                            @hasSection('heading')
                                <h1 style="margin: 0 0 12px; font-size: 22px; color: #111; font-weight: 700;">
                                    @yield('heading')
                                </h1>
                            @endif

                            @hasSection('intro')
                                <p style="margin: 0 0 18px; font-size: 14px; line-height: 1.6; color: #555;">
                                    @yield('intro')
                                </p>
                            @endif

                            @yield('content')
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 16px 32px 24px; border-top: 1px solid #eee; font-family: Arial, sans-serif;">
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td align="left" style="font-size: 12px; color: #999;">
                                        DSAC Systems
                                    </td>
                                    <td align="right" style="font-size: 12px; color: #999;">
                                        Documento generado automaticamente
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
