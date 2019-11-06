<html>
<head>
    <title>Приветствие</title>
</head>
<body>
<form method='POST' action='welcome.php'>
<select name='language'><option>Выбор языка</option>

  <?php $users = require __DIR__ . '/users.php';
  foreach ($users as $user)
  {
    if($user['lang'] != '')
       echo "<option value='" . $user['lang'] . "'>" .  $user['lang'] . "</option>";
  } 
  ?>

</select> <br><br>
<div> <button type='submit'>Выбрать</button> </div>
</form>
</body>
</html>
