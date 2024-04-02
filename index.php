<?php
// Include required files
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

// Check if form is submitted for code verification
$isCodeValid = false;
if (isset($_POST['code'])) {
    $verificationCode = $_POST['code'];
    if ($verificationCode !== null) {
        $isCodeValid = $ga->checkCode($secretKey, $verificationCode);
    }
}

// Display HTML
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sample Website with Google Authenticator</title>
</head>
<body>
    <h1>Sample Website with Google Authenticator</h1>
    <?php if ($isCodeValid !== false): ?>
        <p>Code Verified Successfully!</p>
    <?php elseif (isset($verificationCode)): ?>
        <p>Invalid Code. Please try again.</p>
    <?php endif; ?>
    <img src="<?php echo $qrCodeUrl; ?>" alt="QR Code">
    <form method="post">
        <label for="code">Enter verification code:</label><br>
        <input type="text" id="code" name="code" required><br>
        <button type="submit">Verify</button>
    </form>
</body>
</html>
