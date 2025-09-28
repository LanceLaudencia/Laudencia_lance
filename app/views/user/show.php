<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Students Info</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #667eea, #764ba2);
      margin: 0;
      padding: 2rem 1rem;
      color: #333;
      min-height: 100vh;
    }
    h1 {
      text-align: center;
      margin-bottom: 2rem;
      font-weight: 800;
      font-size: 2.2rem;
      color: #fff;
      text-shadow: 2px 2px 8px rgba(0,0,0,0.2);
    }
    .pagination {
  display: flex;
  justify-content: center; /* or space-between, space-around */
  align-items: center;
  gap: 8px; /* spacing between links */
  margin-top: 20px;
}

.pagination a {
  text-decoration: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-radius: 6px;
  background: #f9f9f9;
  color: #333;
  transition: 0.2s;
}

.pagination a:hover {
  background: #007bff;
  color: white;
  border-color: #007bff;
}

    /* Search form */
    .search-form {
      display: flex;
      justify-content: center;
      margin-bottom: 2rem;
      gap: 0.5rem;
    }
    .search-form input {
      padding: 0.6rem 1rem;
      border: none;
      border-radius: 6px;
      width: 250px;
      font-size: 1rem;
      outline: none;
      box-shadow: 0 4px 8px rgba(0,0,0,0.15);
    }
    .search-form button {
      padding: 0.6rem 1.2rem;
      background: #ff7e5f;
      color: white;
      border: none;
      border-radius: 6px;
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      box-shadow: 0 6px 12px rgba(255, 126, 95, 0.4);
      transition: background 0.3s ease;
    }
    .search-form button:hover {
      background: #eb4d2c;
    }

    /* Table */
    table {
      width: 100%;
      max-width: 950px;
      margin: 0 auto 2rem auto;
      border-collapse: collapse;
      background: white;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 12px 25px rgba(0,0,0,0.2);
    }
    thead {
      background: linear-gradient(90deg, #667eea, #764ba2);
      color: white;
      font-weight: 700;
    }
    th, td {
      padding: 1rem;
      text-align: left;
      border-bottom: 1px solid #eee;
    }
    tbody tr:hover {
      background: #f9f0ff;
    }

    /* Action buttons */
    .actions a {
      display: inline-block;
      padding: 0.4rem 0.8rem;
      border-radius: 6px;
      font-weight: 600;
      font-size: 0.9rem;
      text-decoration: none;
      transition: all 0.3s ease;
    }
    .actions a:first-child {
      background: #ffc107;
      color: #333;
      margin-right: 0.4rem;
    }
    .actions a:first-child:hover {
      background: #e0a800;
      color: #fff;
    }
    .actions a:last-child {
      background: #dc3545;
      color: #fff;
    }
    .actions a:last-child:hover {
      background: #b52a37;
    }

    /* Create button */
    .create-link {
      display: block;
      width: max-content;
      margin: 0 auto;
      padding: 0.8rem 1.6rem;
      background: #28a745;
      color: white;
      font-weight: 700;
      border-radius: 10px;
      text-decoration: none;
      font-size: 1rem;
      box-shadow: 0 8px 18px rgba(40, 167, 69, 0.4);
      transition: background 0.3s ease;
    }
    .create-link:hover {
      background: #1e7e34;
    }

    /* Pagination */
    .pagination {
      text-align: center;
      margin-top: 1.5rem;
    }
    .pagination a {
      display: inline-block;
      margin: 0 0.3rem;
      padding: 0.6rem 1rem;
      background: #fff;
      border-radius: 6px;
      border: 1px solid #ddd;
      color: #764ba2;
      font-weight: 600;
      text-decoration: none;
      box-shadow: 0 3px 6px rgba(0,0,0,0.1);
      transition: all 0.3s ease;
    }
    .pagination a:hover {
      background: #764ba2;
      color: #fff;
    }

    @media (max-width: 600px) {
      table, thead, tbody, th, td, tr { display: block; }
      thead tr { display: none; }
      tbody tr {
        margin-bottom: 1.5rem;
        background: white;
        border-radius: 12px;
        box-shadow: 0 6px 15px rgba(0,0,0,0.1);
        padding: 1rem;
      }
      tbody td {
        padding-left: 50%;
        position: relative;
        border: none;
        border-bottom: 1px solid #eee;
      }
      tbody td::before {
        position: absolute;
        top: 50%;
        left: 1rem;
        transform: translateY(-50%);
        font-weight: 700;
        white-space: nowrap;
        color: #555;
      }
      tbody td:nth-of-type(1)::before { content: "ID"; }
      tbody td:nth-of-type(2)::before { content: "Username"; }
      tbody td:nth-of-type(3)::before { content: "Email"; }
      tbody td:nth-of-type(4)::before { content: "Password"; }
      tbody td:nth-of-type(5)::before { content: "Actions"; }
    }
  </style>
</head>
<body>


   <h2>
    <?= ($logged_in_user['role'] === 'admin') ? 'Admin Dashboard' : 'User Dashboard'; ?>
      </h2>


      <?php if(!empty($logged_in_user)): ?>
        <div class="user-status">
          <strong>Welcome:</strong> 
          <span class="username"><?= html_escape($logged_in_user['username']); ?></span>
        </div>
      <?php else: ?>
        <div class="user-status error">
          Logged in user not found
        </div>
      <?php endif; ?>


  <h1> Students Info</h1>


  <form action="<?=site_url('user/show');?>" method="get" class="search-form">
    <?php $q = $_GET['q'] ?? ''; ?>
    <input name="q" type="text" placeholder=" Search students..." value="<?=html_escape($q);?>">
    <button type="submit">Search</button>
  </form>

  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>UserName</th>
        <th>Email</th>
        <th>Password</th>
         <?php if ($logged_in_user['role'] === 'admin'): ?>
            <th>Password</th>
            <th>Role</th>
            <th>Actions</th>
          <?php endif; ?>
      </tr>
    </thead>


    <tbody>
      <?php foreach ($users as $user): ?>
      <tr>
        <td><?=html_escape($user['id']); ?></td>
        <td><?=html_escape($user['username']); ?></td>
        <td><?=html_escape($user['email']); ?></td>
        <td><?=html_escape($user['password']); ?></td>
        <?php if ($logged_in_user['role'] === 'admin'): ?>
              <td>*******</td>
              <td><?= html_escape($user['role']); ?></td>
            <?php endif; ?>


        <td class="actions">
          <a href="<?=site_url('/user/update/'.$user['id']);?>"> Update</a>
          <a href="<?=site_url('/user/delete/'.$user['id']);?>"> Delete</a>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  

  <div class="pagination">
    <?= $page; ?>
  </div>

  <a href="<?=site_url('user/create'); ?>" class="create-link">+ Add New Student</a>

</body>
</html>
