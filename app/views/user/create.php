<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Update</title>
  <style>
    * {
      box-sizing: border-box;
    }
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #667eea, #764ba2);
      margin: 0;
      padding: 0;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      color: #333;
    }
    .container {
      background: #fff;
      padding: 2.5rem 3rem;
      border-radius: 12px;
      box-shadow: 0 12px 30px rgba(0,0,0,0.15);
      width: 100%;
      max-width: 420px;
      text-align: center;
    }
    h1 {
      margin-bottom: 1.8rem;
      color: #4a4a4a;
      font-weight: 700;
      font-size: 1.8rem;
    }
    form {
      text-align: left;
    }
    label {
      display: block;
      margin-bottom: 0.4rem;
      font-weight: 600;
      color: #555;
      font-size: 0.95rem;
    }
    input[type="text"],
    input[type="email"] {
      width: 100%;
      padding: 0.55rem 0.75rem;
      margin-bottom: 1.4rem;
      border: 2px solid #ddd;
      border-radius: 8px;
      font-size: 1rem;
      transition: border-color 0.3s ease;
    }
    input[type="text"]:focus,
    input[type="email"]:focus {
      border-color: #764ba2;
      outline: none;
      box-shadow: 0 0 8px rgba(118, 75, 162, 0.4);
    }
    button {
      width: 100%;
      padding: 0.75rem;
      background: #764ba2;
      border: none;
      border-radius: 8px;
      color: white;
      font-size: 1.1rem;
      font-weight: 700;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }
    button:hover {
      background: #5a357a;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Welcome to Create View</h1>
    <form action="<?= site_url('user/create'); ?>" method="post">
      <label for="last_name">Last Name</label>
      <input type="text" name="last_name" id="last_name"  required />

      <label for="first_name">First Name</label>
      <input type="text" name="first_name" id="first_name"  required />

      <label for="email">Email</label>
      <input type="email" name="email" id="email" required />

      <button type="submit">Submit</button>
    </form>
  </div>
</body>
</html>