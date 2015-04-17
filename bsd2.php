<?php include("protect.php"); ?>
<?php
echo "This information needs to be secured. Members area. Only members should be able to access it";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dolar's Word List</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bs/jquery-ui.css">
  <link rel="stylesheet" href="bs/bootstrap.min.css">
  <script src="bs/jquery.min.js"></script>
  <script src="bs/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="bs/jquery-ui.js"></script>
</head>
<body>

  <?php
      $username = "dolar";
      $password = "123456";
      $host = "localhost";

      $connector = mysql_connect($host,$username,$password)
          or die("Unable to connect");
        // echo "Connections are made successfully::";
      $selected = mysql_select_db("word_list", $connector)
        or die("Unable to connect");

      # Prepare the SELECT Query
  $selectSQL = 'SELECT * FROM `words`';
  # Execute the SELECT Query
  if( !( $selectRes = mysql_query( $selectSQL ) ) ){
    echo 'Retrieval of data from Database Failed - #'.mysql_errno().': '.mysql_error();
  }else{
    ?>

</head>

<div class="container">
  <h2>Share some english words with bangla meaning</h2>
  <p>Please enter english word and its bangla meaning here.</p>
  <!-- <form action="<?php echo htmlentities( $_SERVER['PHP_SELF'] );?>" method="post"> -->
  <form class="form-inline" role="form" action ="<?php echo htmlentities( $_SERVER['PHP_SELF'] );?>" method="post" action="bsd-do.php">
    <div class="form-group">
      <label for="english">English:</label>
      <input type="english" class="form-control" name="english" id="english" placeholder="Enter english word">
    </div>
    <div class="form-group">Bangla:</label>
      <input type="bangla" class="form-control" name="bangla" id="bangla" placeholder="Enter bangla word">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-7">
        <h2>Words List</h2>
        <p>This word list will help to improve english learning.</p>            
        <table class="table table-bordered">
              <thead>
                <tr>
                  <th><center>Serial</center></th>
                  <th><center>English</center></th>
                  <th><center>Bangla</center></th>
                  <th><center>Action</center></th>
                </tr>
              </thead>
            <tbody>
              <?php
                while( $row = mysql_fetch_assoc( $selectRes ) ){
                  echo "<tr>
                          <td><center>{$row['id']}</center></td>
                          <td><center>{$row['english']}</center></td>
                          <td><center>{$row['bangla']}</center></td>
                          <td><center>Edit/Del</center></td>
                        </tr>\n";
                  }
                }
              ?>
            </tbody>
        </table>
    </div>
  </div>
</div>
</body>
</html>