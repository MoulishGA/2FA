<?php
include_once __DIR__.'/src/FixedBitNotation.php';
include_once __DIR__.'/src/GoogleAuthenticatorInterface.php';
include_once __DIR__.'/src/GoogleAuthenticator.php';
include_once __DIR__.'/src/GoogleQrUrl.php';

use Sonata\GoogleAuthenticator\GoogleAuthenticator;

session_start();

// Initialize Google Authenticator
$g = new GoogleAuthenticator();

$secret = 'DB2EAFQFOV34V4PD';

// Fetch code from Google Authenticator
$code = $g->getCode($secret);

// Calculate time remaining until code expires
$timeRemaining = 30 - (time() % 30); // Google Authenticator codes expire every 30 seconds

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MGM 2FA</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            max-width: 400px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
        }

        #code {
            font-size: 24px;
            margin-bottom: 20px;
        }

        #timer {
            font-size: 18px;
            color: #888;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>MGM 2FA</h2>
        <div id="code"><?php echo $code; ?></div>
        <div id="timer">Code expires in <?php echo $timeRemaining; ?> seconds</div>
    </div>

    <script>
        // Refresh the page every 1 second
        setInterval(() => {
            location.reload();
        }, 1000);
    </script>
</body>
</html>
