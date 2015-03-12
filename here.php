<!DOCTYPE html>
<?php
    $name = $_SERVER["SERVER_NAME"];
    $self = $_SERVER["PHP_SELF"];
    $wami = "$name".$self;
    $sstatus = session_status();
    $ssid = session_id();
?>
<html>
    <head>
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
        <title>Welcome to <?php print $name ?>!</title>
        <style>
        body {
            width: 35em;
            margin: 0 auto;
            font-family: Tahoma, Verdana, Arial, sans-serif;
        }
        </style>
    </head>
    <body>
        <h1>Welcome to <?php print $name; ?>!</h1>
        <h3>You are at <?php print $wami;?></h3>
        EOF
    </body>
</html>