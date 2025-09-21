<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Show</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #f4f6fc;
      margin: 0;
      padding: 2rem 1rem;
      color: #333;
      min-height: 100vh;
    }
    h1 {
      text-align: center;
      margin-bottom: 2rem;
      font-weight: 700;
      color: #444;
    }
    table {
      width: 100%;
      max-width: 900px;
      margin: 0 auto 2rem auto;
      border-collapse: collapse;
      background: white;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }
    thead {
      background: #764ba2;
      color: white;
      font-weight: 700;
    }
    th, td {
      padding: 0.85rem 1.2rem;
      text-align: left;
      border-bottom: 1px solid #eaeaea;
    }
    tbody tr:hover {
      background: #f0e9ff;
    }
    a {
      color: #764ba2;
      font-weight: 600;
      text-decoration: none;
      margin-right: 0.8rem;
      transition: color 0.3s ease;
    }
    a:hover {
      color: #5a357a;
      text-decoration: underline;
    }
    .actions {
      white-space: nowrap;
    }
    .create-link {
      display: block;
      width: max-content;
      margin: 0 auto;
      padding: 0.6rem 1.2rem;
      background: #28a745;
      color: white;
      font-weight: 700;
      border-radius: 8px;
      text-decoration: none;
      box-shadow: 0 6px 15px rgba(40, 167, 69, 0.4);
      transition: background-color 0.3s ease;
    }
    .create-link:hover {
      background: #1e7e34;
    }
    @media (max-width: 600px) {
      table, thead, tbody, th, td, tr {
        display: block;
      }
      thead tr {
        display: none;
      }
      tbody tr {
        margin-bottom: 1.5rem;
        background: white;
        border-radius: 10px;
        box-shadow: 0 6px 15px rgba(0,0,0,0.05);
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
      tbody td:nth-of-type(2)::before { content: "Last Name"; }
      tbody td:nth-of-type(3)::before { content: "First Name"; }
      tbody td:nth-of-type(4)::before { content: "Email"; }
      tbody td:nth-of-type(5)::before { content: "Update"; }
      tbody td:nth-of-type(6)::before { content: "Delete"; }
      .actions a {
        margin-right: 0;
        display: inline-block;
        margin-bottom: 0.5rem;
      }
    }
  </style>
</head>
<body>

  <h1>Students Info</h1>
    <form action="<?=site_url('students');?>" method="get" class="col-sm-4 float-end d-flex search-form" class="search-form">
		<?php
		$q = '';
		if(isset($_GET['q'])) {
			$q = $_GET['q'];
		}
		?>
        <input class="form-control me-2" name="q" type="text" placeholder="Search" value="<?=html_escape($q);?>">
        <button type="submit" class="btn btn-primary" type="button">Search</button>	
	</form>
    <table>
        <tr>
            <th>ID</th>
            <th>Last Name</th>
            <th>FIrst Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php foreach (html_escape($students) as $student): ?>
        <tr>
            <td><?=$student['id']; ?></td>
            <td><?=$student['last_name']; ?></td>
            <td><?=$student['first_name']; ?></td>
            <td><?=$student['email']; ?></td>
            <td>
                <a href="<?=site_url('/users/update/'.$student['id']);?>">Update</a>
                <a href="<?=site_url('/users/delete/'.$student['id']);?>">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <?php
	echo $page;?>
    <div class="button-container">
        <a href="<?=site_url('users/create'); ?>" class="btn-create">+ Create New User</a>
    </div>
   
</body>
</html>