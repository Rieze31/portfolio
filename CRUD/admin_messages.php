<?php
$conn = new mysqli("localhost", "root", "", "portfolio_db");
$result = $conn->query("SELECT * FROM messages ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Messages</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background-color: #0d0d0d;
      color: #fff;
      padding: 2rem;
    }

    h2 {
      text-align: center;
      font-size: 2rem;
      margin-bottom: 2rem;
      color: #00ffff;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background: #1a1a1a;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
    }

    th, td {
      padding: 1rem;
      text-align: left;
      border-bottom: 1px solid #333;
    }

    th {
      background-color: #121212;
      color: #00ffff;
      text-transform: uppercase;
      font-size: 0.9rem;
    }

    td {
      font-size: 0.95rem;
    }

    tr:hover {
      background-color: #222;
    }

    a {
      color: #ff5c00;
      text-decoration: none;
      font-weight: bold;
    }

    a:hover {
      text-decoration: underline;
    }

    .actions {
      display: flex;
      gap: 1rem;
    }

    @media (max-width: 768px) {
      table, thead, tbody, th, td, tr {
        display: block;
      }

      th {
        display: none;
      }

      td {
        padding: 1rem 0;
        position: relative;
      }

      td::before {
        content: attr(data-label);
        position: absolute;
        top: 1rem;
        left: 0;
        width: 150px;
        font-weight: bold;
        color: #00ffff;
      }

      .actions {
        flex-direction: column;
      }
    }
  </style>
</head>
<body>

  <h2>Messages</h2>
  <table>
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Message</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
          <td data-label="Name"><?= htmlspecialchars($row['name']) ?></td>
          <td data-label="Email"><?= htmlspecialchars($row['email']) ?></td>
          <td data-label="Message"><?= htmlspecialchars($row['message']) ?></td>
          <td data-label="Actions">
            <div class="actions">
              <a href="edit_message.php?id=<?= $row['id'] ?>">Edit</a>
              <a href="delete_message.php?id=<?= $row['id'] ?>">Delete</a>
            </div>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>

</body>
</html>
