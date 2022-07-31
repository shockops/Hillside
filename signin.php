<?php
    session_start();
    require('./database.php');
    require('./Controller/signinController.php');
    if(isset($_SESSION['userid'])){
        session_destroy();
    }

    if(isset($_GET['signin']))
    {
        $UserID = $_POST['UserID'];
        $password = $_POST['password'];

        $val = new ValidateLogin();
        $allval = $val->get((array('UserID' => $UserID)));

            foreach($allval as $vals)
            {
              echo '<script>alert("' . $vals['UserID']. '")</script>';
                if(empty($vals['UserID']) === false && password_verify($password, $vals['Password']))
                {
                  echo '<script>alert("if")</script>';
                    $_SESSION['UserID'] = $vals['UserID'];
                    $_SESSION['Username'] = $vals['Firstname'] . ' '.$vals['Lastname'];
                    header('Location: ./index.php');
                }
                else
                {
                  echo '<script>alert("Benutzer-ID oder Passwort war ungültig")</script>';
                    $errorMessage = "Benutzer-ID oder Passwort war ungültig<br>";
                }
            }
        }
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">



  <!-- Bootstrap core CSS -->
  <link href="./css/bootstrap.css" rel="stylesheet">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="./css/signin.css" rel="stylesheet">
</head>

<body class="text-center">

  <main class="form-signin">
    <form action="?signin=1" method="post">
      <img class="mb-4" src="./assets/logo/mountain-128.png" alt="" width="128" height="128">
      <h1 class="h3 mb-3 fw-normal">Bitte anmelden</h1>

      <div class="form-floating">
        <input type="text" class="form-control" name="UserID" placeholder="name@example.com">
        <label for="floatingInput">Benutzer-ID</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" name="password" placeholder="Password">
        <label for="floatingPassword">Passwort</label>
      </div>

      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Vergiss mein nicht
        </label>
      </div>
      <button class="w-100 btn btn-lg btn-primary" type="submit">Anmelden</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
    </form>
  </main>



</body>

</html>

<?php

?>