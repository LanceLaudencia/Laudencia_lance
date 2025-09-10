<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show</title>
</head>
<body>
    <h1>Welcome to Show View</h1>
 <table border="1">
        <tr>
            <th>ID</th>
            <th>LastName</th>
            <th>FirstName</th>
            <th>Email</th>
        </tr>
        <?php foreach ($students as $students): ?>
            <tr>
                <td><?= html_escape($students['id']); ?></td>
                <td><?= html_escape($students['last_name']); ?></td>
                <td><?= html_escape($students['first_name']); ?></td>
                <td><?= html_escape($students['email']); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <a href="<?= site_url('user/create'); ?>">Create Record</a>

</body>
</html>