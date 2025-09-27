<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>

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
      background: linear-gradient(135deg, #6a11cb, #2575fc);
    }

    .register-container {
      background: #fff;
      padding: 40px 35px;
      border-radius: 15px;
      width: 100%;
      max-width: 400px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
      text-align: center;
    }

    .register-container h2 {
      font-size: 28px;
      font-weight: 600;
      margin-bottom: 25px;
      color: #333;
    }

    .register-container form input,
    .register-container form select {
      width: 100%;
      padding: 14px 18px;
      margin-bottom: 20px;
      border-radius: 8px;
      border: 1px solid #ddd;
      font-size: 15px;
      outline: none;
      transition: 0.3s ease;
    }

    .register-container form input:focus,
    .register-container form select:focus {
      border-color: #2575fc;
      box-shadow: 0 0 5px rgba(37, 117, 252, 0.4);
    }

    .password-field {
      position: relative;
      margin-bottom: 20px;
    }

    .password-field input {
      width: 100%;
      padding: 14px 45px 14px 18px;
    }

    .password-field i {
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
      background: linear-gradient(135deg, #6a11cb, #2575fc);
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
  <div class="register-container">
    <h2>Register</h2>
    <form method="POST" action="<?= site_url('auth/register'); ?>">
      <input type="text" name="username" placeholder="Username" required>
      <input type="email" name="email" placeholder="Email" required>

      <!-- Password field -->
      <div class="password-field">
        <input type="password" id="password" name="password" placeholder="Password" required>
        <i class="fa-solid fa-eye" id="togglePassword"></i>
      </div>

      <!-- Confirm Password field -->
      <div class="password-field">
        <input type="password" id="confirmPassword" name="confirm_password" placeholder="Confirm Password" required>
        <i class="fa-solid fa-eye" id="toggleConfirmPassword"></i>
      </div>

      <select name="role" required>
        <option value="user" selected>User</option>
        <option value="admin">Admin</option>
      </select>

      <button type="submit">Register</button>
    </form>
    <div class="group">
      <p>Already have an account? <a href="<?= site_url('auth/login'); ?>">Login here</a></p>
    </div>
  </div>

  <script>
    function toggleVisibility(toggleId, inputId) {
      const toggle = document.getElementById(toggleId);
      const input = document.getElementById(inputId);

      toggle.addEventListener('click', function () {
        const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
        input.setAttribute('type', type);

        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
      });
    }

    toggleVisibility('togglePassword', 'password');
    toggleVisibility('toggleConfirmPassword', 'confirmPassword');
  </script>
</body>

</html>
