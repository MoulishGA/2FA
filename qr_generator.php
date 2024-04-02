<?php
include_once __DIR__.'/src/FixedBitNotation.php';
include_once __DIR__.'/src/GoogleAuthenticatorInterface.php';
include_once __DIR__.'/src/GoogleAuthenticator.php';
include_once __DIR__.'/src/GoogleQrUrl.php';

// Initialize Google Authenticator
$ga = new Google\Authenticator\GoogleAuthenticator();

// Secret key obtained from your database
$secretKey = 'DB2EAFQFOV34V4PD';

// Generate QR code URL
$qrCodeUrl = Google\Authenticator\GoogleQrUrl::generate('SampleWebsite', $secretKey);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Generator</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>QR Code for Authenticator</h2>
        <center><img src="<?php echo $qrCodeUrl; ?>" alt="QR Code"></center><br>
        <form action="gateway.php" method="get">
            <button type="submit" class="button">Enter Code</button>
        </form>
    </div>
</body>
</html>
