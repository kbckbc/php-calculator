<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Simple Calculator</title>
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.min.css">
    <link rel="stylesheet" href="cal.css">
  </head>
  <body>
    <h1> Simple Calculator by PHP </h1>
    <h5> Choose operator</h5>
    <form name="myForm" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" >
      <input type="radio" id="plus" name="operator" value="plus" required>
      <label for="plus">+</label><br>
      <input type="radio" id="minus" name="operator" value="minus">
      <label for="minus">-</label><br>
      <input type="radio" id="multiply" name="operator" value="multiply">
      <label for="multiply">*</label><br>
      <input type="radio" id="divide" name="operator" value="divide">
      <label for="divide">/</label><br>
      <br>
      <h5>Variable #1:</h5>
      <input type="number" name="firstVar" required >
      <h5>Variable #2:</h5> 
      <input type="number" name="secondVar" required >

      <input type="submit" value="Submit">
      <input type="reset" value="Clear">      
    </form>

    <?php
    if( !isset($_GET['operator']) || !isset($_GET['firstVar']) || !isset($_GET['secondVar']) ) {
      return;
    }

    $op = $_GET['operator'];
    $var1 = $_GET['firstVar'];
    $var2 = $_GET['secondVar'];
    $result;
    
    if( strcmp($op,'plus') == 0 ) {
      $result = $var1 + $var2;
      $op = '+';
    }
    else if( strcmp($op,'minus') == 0 ) {
      $result = $var1 - $var2;
      $op = '-';
    }
    else if( strcmp($op,'multiply') == 0 ) {
      $result = $var1 * $var2;
      $op = '*';
    }
    else if( strcmp($op,'divide') == 0 ) {
      if( strcmp($var2, '0') == 0) {
        printf("Can't divide with zero");
        return;
      }
      else {
        $result = $var1 / $var2;
        $op = '/';
      }
    }
    printf("<h4>%d %s %d = %f</h4>", $var1, $op, $var2, htmlentities($result));
    ?>
  </body>
</html>
