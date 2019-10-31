<?php
  session_start();
  ob_start();

  function checkAuth(string $login, string $password): bool
  {  
      $users = require __DIR__ . '/users.php';
      foreach ($users as $user) {
          if ($user['login'] === $login && $user['password'] === $password) {
  
              $_SESSION['userLang'] = $user['lang'];
              $_SESSION['allLang'] = $users;
              $_SESSION['userLogin'] = $login;
              return true;
          }
      }
      return false;
  }
?>