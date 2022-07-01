<?php
session_start();
// Initialize the session
// Include config file
require('../config.php');
if (empty($_SESSION['pat_id'])) {
  header("location: ../signIn.php");
}

?>
<!DOCTYPE html>

<html>

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Justha Care - Chat</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="./css/chat.css" />
  <link rel="shortcut icon" href="../images/logo.png">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body>
  <div class="wrapper">
    <section class="chat-area">
      <header>
        <?php
        $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
        $sql = mysqli_query($conn, "SELECT * FROM doctor WHERE doc_id = {$user_id}");
        if (mysqli_num_rows($sql) > 0) {
          $row = mysqli_fetch_assoc($sql);
        } else {
          header("location: chat_doctor.php");
        }
        ?>
        <a href="chat_doctor.php" class="back-icon"><i class="fa fa-arrow-left"></i></a>
        <img src="../images/<?php echo $row['image']; ?>" alt="">
        <div class="details">
          <span><?php echo $row['firstname'] . " " . $row['lastname'] ?></span>
          <p><?php echo $row['status']; ?></p>
        </div>
      </header>
      <div class="chat-box">

      </div>
      <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
        <button><i class="fa fa-telegram"></i></button>
  </div>
  </section>
  </div>

  <script src="chat.js"></script>

</body>

</html>