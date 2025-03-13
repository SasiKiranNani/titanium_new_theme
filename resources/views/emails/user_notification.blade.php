{{-- this agreement was sharing to mail from the list with url --}}

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contract Email</title>
</head>

<body>

    <table align="center" width="100%">
        <tr>
            <td>
                <p>Hello, </p>
            </td>
        </tr>
        <tr>
            <td>
                <p>Attached is your agreement for review. Kindly take a moment to go over it and sign. Thank you!</p>
            </td>
        </tr>
        <tr>
            <td>
                <a href="{{ $data['url'] }}"
                    style="display: inline-block; padding: 12px 24px; font-size: 16px; color: #fff; background-color: #007bff; text-decoration: none; border-radius: 5px;">View
                    Agreement</a>
            </td>
        </tr>
    </table>

</body>

</html>
