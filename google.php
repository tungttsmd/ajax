<?php

// Nếu là request Ajax từ JavaScript
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'])) {
  $data = $_POST['name'];
  echo "Server nhận được: " . htmlspecialchars($data);
  exit; // Dừng tại đây để không in phần HTML bên dưới
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search'])) {
  $data = $_POST['search'];
  var_dump($_POST);
  echo "hello";
  echo htmlspecialchars($data) . "<br>";
  exit; // Dừng tại đây để không in phần HTML bên dưới
};
?>

<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <title>Ajax 1 file PHP</title>
</head>

<body>
  <form>
    <input type="text" name="search" placeholder="Nhập gì đó..." />
    <button name="submit">Tìm kiếm</button>
    <div class="displayAjax"></div>
  </form>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>;
  <script src="ajax-v1p1.js"></script>
</body>

</html>