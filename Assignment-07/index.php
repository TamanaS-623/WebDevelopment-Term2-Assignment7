<?php
session_start()
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>a7-Tamana Seddiqi-991528861</title>
    <link href="css.css" rel="stylesheet" type="text/css"
  </head>
  <body>
    <div class="box">
      <div class="header">
        <h1>Try Your Luck!!!</h1>
      </div>
      <div class="html">
        <form action="" method="post">
          Enter The Pin:
          <input type="number" name="num1" min="0" max="9"/>
          <input type="number" name="num2" min="0" max="9" />
          <input type="number" name="num3" min="0" max="9" /><br /><br />
          <input type="submit" value="Open" name="open"/>
          <input type="submit" value="Close" name="close"/>
        </form>
      </div>

      <div class="php">
        <?php
          if(isset($_SESSION['randNum1']))
            $_SESSION['randNum1'] = $_SESSION['randNum1'];
          else
            $_SESSION['randNum1'] = rand(0, 9);
            $_randNum1 = $_SESSION['randNum1'];

          if(isset($_SESSION['randNum2']))
            $_SESSION['randNum2'] = $_SESSION['randNum2'];
          else
            $_SESSION['randNum2'] = rand(0, 9);
            $_randNum2 = $_SESSION['randNum2'];

          if(isset($_SESSION['randNum3']))
            $_SESSION['randNum3'] = $_SESSION['randNum3'];
          else
            $_SESSION['randNum3'] = rand(0, 9);
            $_randNum3 = $_SESSION['randNum3'];

          $_SESSION['num1'] = $_POST['num1'];
          $_SESSION['num2'] = $_POST['num2'];
          $_SESSION['num3'] = $_POST['num3'];
          $_SESSION['open'] = $_POST['open'];
          $_SESSION['close'] = $_POST['close'];

          function decision(){
            if(empty($_SESSION['open'] || ($_SESSION['randNum1']!=$_POST['num1']) || ($_SESSION['randNum2']!=$_POST['num2']) || ($_SESSION['randNum3']!=$_POST['num3']))){
                echo '<img src="images/close-briefcase.PNG" /><br />';
            }

            if(isset($_SESSION['open']) && $_SESSION['open'] != ""){
              if(check()){
                if(($_SESSION['randNum1']==$_POST['num1']) && ($_SESSION['randNum2']==$_POST['num2']) && ($_SESSION['randNum3']==$_POST['num3'])){
                  echo '<img src="images/open-briefcase.jpg" /><br />';
                }
              }
            }

            else if(isset($_SESSION['close'])){
              echo '<img src="images/close-briefcase.PNG" /><br />';
            }

            else{
              echo '<img src="images/close-briefcase.PNG" /><br />';
            }
          }

        decision();

        function check(){
          $_result = true;
          if(empty($_SESSION['num1'])){
            echo"Enter the First digit<br />";
            $_result = false;
          }
          elseif($_SESSION['randNum1']!=$_SESSION['num1']){
            $_result = false;
            echo "First digit is wrong <br />";
          }
          else{
            $_result = true;
            echo "First digit is correct ----- ".$_SESSION['num1']."<br />";
          }

          if(empty($_SESSION['num2'])){
            echo"Enter the Second digit<br />";
            $_result = false;
          }
          elseif($_SESSION['randNum2']!=$_SESSION['num2']){
            $_result = false;
            echo "Second digit is wrong<br />";
          }
          else {
            $_result = true;
            echo "Second digit is correct ----- ".$_SESSION['num2']."<br />";
          }

          if(empty($_SESSION['num3'])){
            echo"Enter the Third digit<br />";
            $_result = false;
          }
          elseif($_SESSION['randNum3']!=$_SESSION['num3']){
            $_result = false;
            echo "Three digit is wrong<br />";
          }
          else{
            $_result = true;
            echo "Third digit is correct ----- ".$_SESSION['num3']."<br />";
          }
          image($_result);
        }

        function image($_result){
          if($_result == "true")
            echo '<img src="images/open-briefcase.jpg" /><br />';
          else
            echo '<img src="images/close-briefcase.PNG" /><br />';
          }

        echo "The Code is: ";
        echo"$_randNum1";
        echo"$_randNum2";
        echo"$_randNum3";
      ?>
    </div>
  </div>
</body>
</html>
