<html>
<head>
    <title>Приветствие</title>
</head>
<body>
	<?php
    session_start();
    ob_start();
	  require __DIR__ . '/auth.php';

    
    viewLang();
    
    function viewLang()
    {
      if($_POST['language'] != ''){
        $_SESSION['userLang'] = $_POST['language'];
      }
      switch ($_SESSION['userLang']) {
        case 'ru': 
          echo "Добро пожаловать," . $_SESSION['userLogin']. "!";
          break;
        case 'en': 
          echo "Welcome," . $_SESSION['userLogin']. "!";
          break;
         case 'ua': 
          echo "Вітаємо," . $_SESSION['userLogin']. "!";
          break;
         case 'it': 
          echo "Prego," . $_SESSION['userLogin']. "!";
          break; 
        default:
          addAllLangToDropDown();
      }
    }

    function addAllLangToDropDown()
    {  
      echo "<form method='POST' action='welcome.php'>";
      echo "<select name='language'><option>Выбор языка</option>";

      foreach ($_SESSION['allLang'] as $user)
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