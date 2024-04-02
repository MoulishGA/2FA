<?php
session_start();
if(isset($_POST['code'])) {
    // Include necessary files
    include_once __DIR__.'/src/FixedBitNotation.php';
    include_once __DIR__.'/src/GoogleAuthenticatorInterface.php';
    include_once __DIR__.'/src/GoogleAuthenticator.php';
    include_once __DIR__.'/src/GoogleQrUrl.php';

    // Initialize Google Authenticator
    $ga = new Google\Authenticator\GoogleAuthenticator();

    // Secret key obtained from your database
    $secretKey = 'DB2EAFQFOV34V4PD';

    // Check the code entered by the user
    $verificationCode = $_POST['code'];
    $isCodeValid = $ga->checkCode($secretKey, $verificationCode);

    // If code is correct, redirect to content.php
    if ($isCodeValid) {
        $_SESSION['authenticated'] = true;
        header("Location: content.php");
        exit();
    } else {
        $errorMessage = "Incorrect code. Please try again.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gateway</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2><center>Enter 2FA Code</center></h2>
        <?php if(isset($errorMessage)): ?>
            <p class="error-message"><?php echo $errorMessage; ?></p>
        <?php endif; ?>
        <form action="gateway.php" method="post">
            <input type="text" name="code" placeholder="Verification Code" required><br>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
