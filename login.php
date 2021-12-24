<?php 

$config = include('config.php');
include('function.php');
$allowedUserTYPE = ["free-web-app"];
//"pro","pro-manual","pro-digistore","pro-digistore-reduced","pro-ios","pro-android",
session_start();
//ession_destroy();


if (isset($_SESSION['userInfo']) && $_SESSION['userInfo'] != ''){
  header('Location: index.php');
}
// define variables and  set  to empty values
$email = $password ="";



if ($_SERVER["REQUEST_METHOD"] == "POST") {


  if (empty($_POST["email"])) {
  $error['email'] = "E-Mail ist erforderlich";
  } else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
  $error['email'] = "Invalid email format";
  } else {
  $email = $_POST["email"];
  }


  if (empty($_POST["password"])) {
  $error['password'] = "Passwort wird benötigt";
  } else {
  $password = $_POST["password"];
  }
  if(empty($error)){

    $apiurl = $config["apiEndPoint"].'loginUser.php';
    $type="POST";
    $data['username'] = $email;
    $data['password'] = $password;
    $data['apiID'] = $config["apiID"];
    $data['apiPassword'] = $config["apiPassword"];

    $curl = curl_init($apiurl);
    curl_setopt($curl, CURLOPT_POST, 1);
    // Insert the data
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($curl);
    $res = (array)json_decode($result);
    //print_r($res);die;
      if($res["status"] == "success"){
          $userInfo['username'] = $email;
          $userInfo['password'] = $password;
          $_SESSION["userInfo"]=$userInfo;
          $config['username'] = $_SESSION['userInfo']['username'];
          $config['password'] = $_SESSION['userInfo']['password'];



          $apiurl = $config["apiEndPoint"].'getUser.php';

          $data['username'] = $email;
          $data['password'] = $password;
          $data['apiID'] = $config["apiID"];
          $data['apiPassword'] = $config["apiPassword"];

          $curl = curl_init($apiurl);
          curl_setopt($curl, CURLOPT_POST, 1);
          // Insert the data
          curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
          curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
          $result = curl_exec($curl);
          $userRes = (array)json_decode($result);
          curl_close($curl);
          //print_r($userRes);die;




          if($userRes["status"] == "success"){
            $userSubcriptions = (array)$userRes['user'];




            if (in_array($userSubcriptions['subscriptionType'], $allowedUserTYPE))
            {


                 $allRecipes = getTotalRecipe($config);
                 //echo"<pre>";print_r( $allRecipes );die ;
                 $_SESSION['recipeItem'] = $allRecipes;
                // redirect('recipe.php');
                $_SESSION['userInfo']['subscriptionType'] = $userSubcriptions['subscriptionType'];
                header('Location: index.php');
               

             }else{
            unset($_SESSION['userInfo']);
            $error['email'] = "Du kannst den Allergen Manager leider nur als PRO Business Nutzer verwenden.";
            }
          }

      }else{
      $error['email'] = "Ein Fehler ist aufgetreten. Bitte versuchen Sie es später noch einmal.";
      }
    //curl_close($curl);
  }
}


include('header.php');
?>


  <body>
    <header class="login-page">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
          <a href="/Rezeptrechner/" class="backbtn"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back</a>
          <a class="navbar-brand" href="#">
            <img src="img/Rez-Logo.png" alt="Rezeptrechner" />
          </a>   
          <div class="hide_div"></div>      
        </div>
      </nav>
    </header>
    
    <main>
        <div class="login-section">          
          <div class="col s12 m6 l6 xl8 display-panel no-margin no-padding center-align">            
            <div class="innerbox">
                <h5>Anmeldung</h5>
                <p>Hier kannst du dich mit deinem Rezeptrechner Account anmelen.</p>
                  
                <!-- <form method="" action="" id="login-form">
                  <div class="input-field">
                    <input id="email" name="email" type="text" class="validate" value="">
                    <label for="email">E-Mail-Addresse</label>                    
                  </div>
                  
                  <div class="input-field">
                    <input id="password" name="password"  type="password" class="validate" value="">
                    <label for="password">Passwort</label>                    
                  </div>

                  <div class="loader_login">
                    <button class="waves-effect waves-light btn">Anmeldung</button>                    
                  </div>
                </form> --> 
                 <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="login-form">
                  <div class="input-field">
                  <input id="email" name="email" type="text" class="validate" placeholder="E-Mail Adresse eingeben" value="<?php echo $email ?>">
                    <p class="error text-danger"><?php echo isset($error['email'])?$error['email']:''?></p>
                    
                  </div>
                  
                  <div class="input-field">
                  <input id="password" name="password" type="password" class="validate" placeholder="Passwort eingeben" value="<?php echo $password ?>">
                    <p class="error text-danger"><?php echo isset($error['password'])?$error['password']:''?></p>
                   
                  </div>

                  <div class="loader_login">
                    <button class="waves-effect waves-light btn">Anmeldung</button>                    
                  </div>
                </form>   
            </div>
            
          </div>
        </section>
      </main>
  <?php
include('footer.php');


?>


