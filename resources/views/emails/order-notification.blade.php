<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notification de Nouvelle Commande</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; background-color: #f4f4f4; margin: 0; padding: 0;">
    <table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="max-width: 600px; margin: auto; background-color: #ffffff; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <tr>
            <td style="padding: 20px 0; text-align: center; background-color: #e7e7e7;">
                <img src="{{ config('app.url') }}/assets/imgs/intercocina-logo.png" alt="Intercocina" style="max-width: 150px; height: auto;">
            </td>
        </tr>
        <tr>
            <td style="padding: 40px 30px;">
                <h1 style="color: #333333; font-size: 24px; margin-bottom: 20px;">Nouvelle Commande Reçue</h1>
                <p style="color: #666666; font-size: 16px; margin-bottom: 30px;">Une nouvelle commande a été passée dans votre boutique.</p>
                <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin-bottom: 30px;">
                    <tr>
                        <td style="padding: 10px; border-bottom: 1px solid #eeeeee;">
                            <strong style="color: #333333;">ID</strong>
                        </td>
                        <td style="padding: 10px; border-bottom: 1px solid #eeeeee;">
                            <span style="color: #666666;">{{ $code }}</span>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 10px; border-bottom: 1px solid #eeeeee;">
                            <strong style="color: #333333;">Client :</strong>
                        </td>
                        <td style="padding: 10px; border-bottom: 1px solid #eeeeee;">
                            <span style="color: #666666;">{{ $customer }}</span>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 10px; border-bottom: 1px solid #eeeeee;">
                            <strong style="color: #333333;">Total :</strong>
                        </td>
                        <td style="padding: 10px; border-bottom: 1px solid #eeeeee;">
                            <span style="color: #666666;">{{ $total_amount }} MAD</span>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 10px;">
                            <strong style="color: #333333;">Date :</strong>
                        </td>
                        <td style="padding: 10px;">
                            <span style="color: #666666;">{{ $date }}</span>
                        </td>
                    </tr>
                </table>
                <table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center">
                    <tr>
                        <td style="border-radius: 4px; background-color: #D32F2F; text-align: center; padding: 15px 30px;">
                            <a href="{{ config('app.url') }}/admin/orders/{{ $order_id }}/view" style="color: #ffffff; text-decoration: none; font-weight: bold; display: inline-block;">Voir les Détails de la Commande</a>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style="padding: 20px 30px; background-color: #eeeeee; text-align: center;">
                <p style="color: #888888; font-size: 14px; margin: 0;">Ceci est un message automatique. Veuillez ne pas répondre à cet e-mail.</p>
            </td>
        </tr>
    </table>
</body>
</html>