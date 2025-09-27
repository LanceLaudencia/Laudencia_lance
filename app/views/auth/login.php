<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/4b9d6e8b60.js" crossorigin="anonymous"></script>

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      background: linear-gradient(135deg, #6a11cb, #2575fc); /* same as Register */
    }

    .login-container {
      background: #fff;
      padding: 40px 35px;
      border-radius: 15px;
      width: 100%;
      max-width: 400px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
      text-align: center;
    }

    .login-container h2 {
      font-size: 28px;
      font-weight: 600;
      margin-bottom: 25px;
      color: #333;
    }

    .error-box {
      background: rgba(255, 0, 0, 0.1);
      color: #d64c42;
      padding: 10px;
      border: 1px solid #d64c42;
      border-radius: 8px;
      margin-bottom: 18px;
      font-size: 0.95em;
      text-align: center;
    }

    .login-container form input {
      width: 100%;
      padding: 14px 45px 14px 18px;
      margin-bottom: 20px;
      border-radius: 8px;
      border: 1px solid #ddd;
      font-size: 15px;
      outline: none;
      transition: 0.3s ease;
    }

    .login-container form input:focus {
      border-color: #2575fc;
      box-shadow: 0 0 5px rgba(37, 117, 252, 0.4);
    }

    .inputBox {
      position: relative;
      margin-bottom: 20px;
    }

    .inputBox i {
      position: absolute;
      right: 15px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      color: #666;
    }

    button {
      width: 100%;
      padding: 14px;
      border: none;
      border-radius: 8px;
      background: linear-gradient(135deg, #6a11cb, #2575fc); /* same as Register */
      color: #fff;
      font-size: 16px;
      font-weight: 600;
      cursor: pointer;
      transition: 0.3s ease;
    }

    button:hover {
      opacity: 0.9;
      transform: scale(1.02);
    }

    .group {
      margin-top: 18px;
    }

    .group p {
      font-size: 14px;
      color: #555;
    }

    .group a {
      color: #2575fc;
      text-decoration: none;
      font-weight: 500;
    }

    .group a:hover {
      text-decoration: underline;
    }
  </style>
</head>

<body>
  <div class="login-container">
    <h2>Login</h2>

    <?php if (!empty($error)): ?>
      <div class="error-box">
        <?= $error ?>
      </div>
    <?php endif; ?>

    <form method="post" action="<?= site_url('auth/login') ?>">
      <div class="inputBox">
        <input type="text" placeholder="Username" name="username" required>
      </div>

      <div class="inputBox">
        <input type="password" placeholder="Password" name="password" id="password" required>
        <i class="fa-solid fa-eye" id="togglePassword"></i>
      </div>

      <button type="submit">Login</button>
    </form>

    <div class="group">
      <p>Don't have an account? <a href="<?= site_url('auth/register'); ?>">Register here</a></p>
    </div>
  </div>

  <script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function () {
      const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
      password.setAttribute('type', type);

      this.classList.toggle('fa-eye');
      this.classList.toggle('fa-eye-slash');
    });
  </script>
</body>

</html>
