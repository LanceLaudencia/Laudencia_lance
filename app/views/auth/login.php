<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>

  
</head>
<body>
 

    <div class="login">
      <h2>Login</h2>

      <?php if (!empty($error)): ?>
        <div style="background: rgba(255,0,0,0.1); color: #d64c42; padding: 10px; border: 1px solid #d64c42; border-radius: 5px; margin-bottom: 15px; text-align: center; font-size: 0.95em;">
          <?= $error ?>
        </div>
      <?php endif; ?>

      <form method="post" action="<?= site_url('auth/login') ?>">
        <div class="inputBox">
          <input type="text" placeholder="Username" name="username" required>
        </div>

        <div class="inputBox">
          <input type="password" placeholder="Password" name="password" id="password" required>
          <i class="fa-solid fa-eye toggle-password" id="togglePassword"></i>
        </div>

        <button type="submit" id="btn">Login</button>
      </form>

      <div class="group">
        <p style="font-size: 0.9em;">
          Don't have an account? <a href="<?= site_url('auth/register'); ?>">Register here</a>
        </p>
      </div>
    </div>
  </section>

  <script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function () {
      const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
      password.setAttribute('type', type);

      // Toggle between fa-eye and fa-eye-slash
      this.classList.toggle('fa-eye');
      this.classList.toggle('fa-eye-slash');
    });
  </script>
</body>
</html>