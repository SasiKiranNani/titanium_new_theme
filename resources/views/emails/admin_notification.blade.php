{{-- this is the mail used to the the assign vehicle details and agreement to the admin --}}

<!DOCTYPE html>
<html>
<head>
    <title>New User Agreement</title>
</head>
<body>
    <h1>New User Agreement Details</h1>
    <p><strong>Name:</strong> {{ $agreementData['name'] }}</p>
    <p><strong>Email:</strong> {{ $agreementData['email'] }}</p>
    <p><strong>ABN:</strong> {{ $agreementData['abn'] }}</p>
    <p><strong>Address:</strong> {{ $agreementData['address'] }}</p>
    <p><strong>Licence No:</strong> {{ $agreementData['licence_no'] }}</p>
    <p><strong>Contact:</strong> {{ $agreementData['contact'] }}</p>
    <p><strong>Authorized Driver Name:</strong> {{ $agreementData['authorised_driver_name'] }}</p>
    <p><strong>Vehicle Registration No:</strong> {{ $agreementData['reg_no'] }}</p>
    <p>Please find the attached agreement PDF.</p>
</body>
</html>
