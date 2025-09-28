<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Students Info</title>
  <style>
/* Pagination */
.pagination {
  display: flex;              /* align items in a row */
  justify-content: center;    /* center horizontally */
  align-items: center;
  gap: 0.5rem;                /* spacing between items */
  margin-top: 1.5rem;
  flex-wrap: wrap;            /* prevent overflow on small screens */
}

.pagination a,
.pagination li {
  list-style: none;
  display: inline-block;
  margin: 0;
  padding: 0.6rem 1rem;
  background: #fff;
  border-radius: 6px;
  border: 1px solid #ddd;
  color: #2575fc;
  font-weight: 600;
  text-decoration: none;
  box-shadow: 0 3px 6px rgba(0,0,0,0.1);
  transition: all 0.3s ease;
}

.pagination a:hover,
.pagination li a:hover {
  background: #2575fc;
  color: #fff;
}


    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #6a11cb, #2575fc);
      margin: 0;
      padding: 2rem 1rem;
      color: #333;
      min-height: 100vh;
    }

    /* Dashboard header */
    .dashboard-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      max-width: 950px;
      margin: 0 auto 1.5rem auto;
      padding: 1rem 1.5rem;
      background: rgba(255, 255, 255, 0.1);
      border-radius: 12px;
      backdrop-filter: blur(10px);
      box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
      color: #fff;
    }

    .dashboard-header h2 {
      margin: 0;
      font-size: 1.5rem;
      font-weight: 700;
    }

    .user-status {
      font-size: 1rem;
    }

    .user-status .username {
      font-weight: bold;
      color: #ffeb3b;
    }

    /* Main title */
    h1 {
      text-align: center;
      margin-bottom: 2rem;
      font-weight: 800;
      font-size: 2.3rem;
      color: #fff;
      text-shadow: 2px 2px 8px rgba(0,0,0,0.3);
    }

    /* Logout button */
    .logout-btn {
      background: #ff4b5c;
      color: #fff;
      border: none;
      padding: 0.6rem 1.2rem;
      border-radius: 8px;
      font-weight: 600;
      cursor: pointer;
      box-shadow: 0 6px 12px rgba(255, 75, 92, 0.4);
      transition: background 0.3s ease;
    }
    .logout-btn:hover {
      background: #e63946;
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
      border-radius: 8px;
      width: 260px;
      font-size: 1rem;
      outline: none;
      box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    }
    .search-form button {
      padding: 0.6rem 1.2rem;
      background: #ff9800;
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      box-shadow: 0 6px 12px rgba(255, 152, 0, 0.4);
      transition: background 0.3s ease;
    }
    .search-form button:hover {
      background: #e68900;
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
      box-shadow: 0 12px 25px rgba(0,0,0,0.25);
    }
    thead {
      background: linear-gradient(90deg, #6a11cb, #2575fc);
      color: white;
      font-weight: 700;
    }
    th, td {
      padding: 1rem;
      text-align: left;
      border-bottom: 1px solid #eee;
    }
    tbody tr:hover {
      background: #f1f5ff;
    }

    /* Action buttons */
    .actions a {
      display: inline-block;
      padding: 0.5rem 1rem;
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
      padding: 0.8rem 1.8rem;
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
      color: #2575fc;
      font-weight: 600;
      text-decoration: none;
      box-shadow: 0 3px 6px rgba(0,0,0,0.1);
      transition: all 0.3s ease;
    }
    .pagination a:hover {
      background: #2575fc;
      color: #fff;
    }

    /* Responsive */
    @media (max-width: 600px) {
      .dashboard-header {
        flex-direction: column;
        gap: 0.5rem;
        text-align: center;
      }
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
      tbody td:nth-of-type(5)::before { content: "Role"; }
      tbody td:nth-of-type(6)::before { content: "Actions"; }
    }
  </style>
</head>
<body>

  <!-- Dashboard header -->
  <div class="dashboard-header">
    <h2><?= ($logged_in_user['role'] === 'admin') ? 'Admin Dashboard' : 'User Dashboard'; ?></h2>
    <?php if(!empty($logged_in_user)): ?>
      <div class="user-status">
        Welcome, <span class="username"><?= html_escape($logged_in_user['username']); ?></span>
      </div>
    <?php else: ?>
      <div class="user-status error">
        Logged in user not found
      </div>
    <?php endif; ?>
    <a href="<?=site_url('/auth/logout'); ?>"><button class="logout-btn">Logout</button></a>
  </div>

  <!-- Main title -->
  <h1>Students Info</h1>

  <!-- Search -->
  <form action="<?=site_url('/user/show');?>" method="get" class="search-form">
    <?php $q = $_GET['q'] ?? ''; ?>
    <input name="q" type="text" placeholder="  Search students..." value="<?=html_escape($q);?>">
    <button type="submit">Search</button>
  </form>

  <!-- Table -->
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Email</th>
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
        <?php if ($logged_in_user['role'] === 'admin'): ?>
          <td>*******</td>
          <td><?= html_escape($user['role']); ?></td>
          <td class="actions">
            <a href="<?=site_url('/user/update/'.$user['id']);?>">Update</a>
            <a href="<?=site_url('/user/delete/'.$user['id']);?>">Delete</a>
          </td>
        <?php endif; ?>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <!-- Pagination -->
  <div class="pagination">
    <?= $page; ?>
  </div>

  <!-- Create -->
  <a href="<?=site_url('user/create'); ?>" class="create-link">+ Add New Student</a>

</body>
</html>
