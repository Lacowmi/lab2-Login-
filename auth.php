<?php
  session_start();

  function checkAuth(string $login, string $password): bool
  {  
      $users = require __DIR__ . '/users.php';
      foreach ($users as $user) {
          if ($user['login'] === $login && $user['password'] === $password) {
              $_SESSION['user'] = $user;
              return true;
          }
      }
      return false;
  }
?>
