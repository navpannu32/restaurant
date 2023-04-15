<?php
  require_once '../database/connect.php';

  if ($_COOKIE['role'] != "admin") {
    header("Location: ../");
    exit();
  }

  $sql = 'SELECT * FROM comments ORDER BY created_at DESC;';
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/admin/comment/comments.css">
  <title>Comments</title>
</head>
<body>
  <?php include_once "../header.php" ?>

  <h1>Comments</h1>

  <table>
    <thead>
      <tr>
        <th>Comment</th>
        <th>Created At</th>
        <th>User</th>
        <th>Status</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($comments as $comment): ?>
        <tr>
          <td><?php echo $comment['comment']; ?></td>
          <td><?php echo $comment['created_at']; ?></td>
          <td><?php echo $comment['user_id']; ?></td>
          <td><?php echo $comment['is_approved'] ? 'Approved' : 'Not Approved'; ?></td>
          <td>
            <?php if (!$comment['is_approved']): ?>
              <a href="../scripts/comment/approve?id=<?php echo $comment['id']; ?>">Approve</a>
            <?php endif; ?>
            <a href="../scripts/comment/delete?id=<?php echo $comment['id']; ?>">Delete</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <?php include_once ".footer.php" ?>
</body>
</html>
