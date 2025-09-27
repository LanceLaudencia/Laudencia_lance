<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
 
</head>
<body>


        <!-- Register Form -->
        <div class="login">
            <h2>Register</h2>
            <form method="POST" action="<?= site_url('auth/register'); ?>" class="inputBox">
                <input type="text" name="username" placeholder="Username" required>
                <input type="email" name="email" placeholder="Email" required>

                <!-- Password field -->
                <div style="position: relative; margin-bottom: 20px;">
                    <input type="password" id="password" name="password" placeholder="Password" required 
                        style="width: 100%; padding: 15px 45px 15px 20px; border-radius: 5px; border: none; font-size: 1.1em;">
                    <i class="fa-solid fa-eye" id="togglePassword" 
                    style="position: absolute; right: 15px; top: 50%; transform: translateY(-50%); cursor: pointer; color: #8f2c24;"></i>
                </div>

                <!-- Confirm Password field -->
                <div style="position: relative; margin-bottom: 20px;">
                    <input type="password" id="confirmPassword" name="confirm_password" placeholder="Confirm Password" required 
                        style="width: 100%; padding: 15px 45px 15px 20px; border-radius: 5px; border: none; font-size: 1.1em;">
                    <i class="fa-solid fa-eye" id="toggleConfirmPassword" 
                    style="position: absolute; right: 15px; top: 50%; transform: translateY(-50%); cursor: pointer; color: #8f2c24;"></i>
                </div>

                <select name="role" required>
                    <option value="user" selected>User</option>
                    <option value="admin">Admin</option>
                </select>

                <button type="submit" id="btn">Register</button>
            </form>
            <div class="group">
                <p>Already have an account? <a href="<?= site_url('auth/login'); ?>">Login here</a></p>
            </div>
        </div>
    </section>
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