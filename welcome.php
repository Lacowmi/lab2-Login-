<html>
<head>
    <title>Приветствие</title>
</head>
<body>
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
        addAllLangToDropDown();
      }
    }

    function addAllLangToDropDown()
    {  
      echo "<form method='POST' action='welcome.php'>";
      echo "<select name='language'><option>Выбор языка</option>";

      $users = require __DIR__ . '/users.php';
      foreach ($users as $user)
      {
        if($user['lang'] != '')
          echo "<option value='" . $user['lang'] . "'>" . $user['lang'] . "</option>";
      }

      echo "</select> <br><br>";
      echo "<div> <button type='submit'>Выбрать</button> </div>";
      echo "</form>";
    }
	?>
</body>
</html>
