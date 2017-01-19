<!DOCTYPE html>
<?php

include('cData.txt');

$mysqli = new mysqli($server, $user, $pass, $dbname, $port)
or die('Error connecting');
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="./assets/favicon.jpg">
    <title>PeelPages</title>
        <link href="./css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/styles.css"> 
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>
    <div>
        <button id="second" type="button" class="btn btn-danger">Quit App</button>
        <button id="second" type="button" class="btn btn-danger">New Address Book</button>
        <button id="second" type="button" class="btn btn-danger">Import</button>

        <div class="container">
          <h2>Address Books</h2>
          <p>Find yo address books here!</p>            
          <table class="table">
            <thead>
              <tr>
                <th>Address Book Name</th>
                <th>Date Created</th>
                <th>Open</th>
                <th>Export</th>
              </tr>
            </thead>
            <tbody>
	      <?php
$stmt = $mysqli -> prepare("SELECT add_name, add_date FROM address");

$stmt->execute();
$r1=null;
$r2=null;
$stmt->bind_result($r1,$r2);
while($stmt->fetch())
        printf('<tr>
                <td>%s</td>
                <td>%s</td>
                <td><button id="first" type="button" class="btn btn-success">Open</button></td>
                <td><button id="first" type="button" class="btn btn-success">Export</button></td>
              </tr>', $r1,$r2 );
	      ?>
              <tr>
                <td>Friends</td>
                <td>01/18/17</td>
                <td><button id="first" type="button" class="btn btn-success">Open</button></td>
                <td><button id="first" type="button" class="btn btn-success">Export</button></td>
              </tr>
              <tr>
                <td>Business</td>
                <td>03/24/14</td>
                <td><button id="first" type="button" class="btn btn-success">Open</button></td>
                <td><button id="first" type="button" class="btn btn-success">Export</button></td>
              </tr>
              <tr>
                <td>Tinder</td>
                <td>02/13/16</td>
                <td><button id="first" type="button" class="btn btn-success">Open</button></td>
                <td><button id="first" type="button" class="btn btn-success">Export</button></td>
              </tr>
            </tbody>
          </table>
        </div>
    </div>
    <div>
    </div>
</body>
    <script src="./js/demo.js"></script>
    <script src="./js/bootstrap.min.js"></script>
</html>
