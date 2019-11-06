	<?php
    session_start();
    $welcome = [
    'ru' => "Добро пожаловать",
    'en' => "Welcome",
    'ua' => "Вітаємо",
    'it' => "Prego"
  ];
	  require __DIR__ . '/auth.php';
    
    
    viewLang($welcome);
    
    function viewLang($welcome)
    {
      if($_POST['language'] != ''){
        $_SESSION['user']['lang'] = $_POST['language'];
        $lang = $_SESSION['user']['lang'];
        echo $welcome[$lang]. ",". $_SESSION['user']['login'];
      } else {
        $welcomeLang = require __DIR__ . '/langDrop.php';
        #$welcomeLang;
      }
    }
	?>
