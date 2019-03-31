<?php
$username = $_POST['username'];
$email = $_POST['email'];
$pwd = $_POST['pwd'];

echo <<<EOT
username: $username
email: $email
pwd: $pwd
EOT
?>