<?php
  $servername = "localhost";
  $username = "root";
  $password = "";

  $conn = mysqli_connect($servername,$username,$password);

  if (!$conn){
    die("Could not connect to server".mysqli_connect_error());
  }
  echo "Connection made.";
