<!DOCTYPE html>
<html>
    <?php 
        //include 'include/mysql_config.inc.php';
        require_once 'include/class_datenbank.php';
        $mos_1 = new datenbank("mos_1") ;
        $mos_2 = new datenbank("mos_2") ;
        $servername = $_SERVER["SERVER_NAME"];
        $self = $_SERVER["PHP_SELF"];
        $wami = "$servername".$self;
        
    ?>
    <head>
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
        <title>Welcome to <?php print $wami ?>!</title>
        <style>
        body {
            width: 40em;
            margin: 0 auto;
            font-family: Tahoma, Verdana, Arial, sans-serif;
        }
        </style>
    </head>
    <body>
        <h4>Welcome to <?php print $wami; ?>!</h4>
        <?php
            $result = $mos_1->abfrage("SELECT * FROM mos_1");
//            // connect to server
//            $result = $tbl_1->abfrage ("SELECT * FROM mos_1") ;
//            // the first select field
//            if (isset($_GET["who"]))
//                {
//                    print "<p>" . $_GET["who"] . " ist nun mit" ;
//                    print " befreundet</p>" ;
//                    unset($_GET["who"]) ;
//                    print $_GET["who"] ;
//                    print "<p><a href='make_friends.php'>weiter</a></p>";
//                }
//            else 
//                    {
//                    if (!isset($_POST["wants_friend"]))
//                        {
//                            print "<p>Wähle einen Namen</p>";
//        //                    $wants_friend = $_POST["wants_friend"];
//                            print "<p>" . "\n";
//                            print "<form method='post'>" . "\n" ;
//                            print "<select name='wants_friend'>" . "\n";
////                            while ($datensatz_mos_1 = mysql_fetch_assoc($mos_1))
//                            while($row=$db->lade_satz($result))
//                                {
//                                    print '<option>' ;
//                                    print $row["user_name"] ;
//                                    print '</option>' ;
//                                }
//                            print "</select>" . "\n" ;
//                            print "<input type='submit' />" ;
//                        }
//                    }
//            mysql_close() ;
//            // (re)connect to server
//            mysql_connect("$serverip","$mysqluser","$mysqlpass");
//            mysql_select_db("$database_name");
//            $query = mysql_query("select * from $tbl");
//            $num = mysql_num_rows($query);
//            if (isset($_POST["wants_friend"]))
//                {
//                    $wants_friend = $_POST["wants_friend"];
//                    print "Wähle Freunde von " . $wants_friend;
//                    print "<form method='post'"
//                        . " action='make_friends.php?who="
//                        . $wants_friend
//                        . "'>" . "\n";
//                    print "<table title='" . $database_name . ":" . $tbl_1 . " border='1'>";
//                    print "<tr><th>Name</th><th>Freund</th></tr>";
//                    while ($datensatz_mos_1 = mysql_fetch_assoc($query))
//                        {
//                            if ($datensatz_mos_1["user_name"] != $wants_friend)
//                            {
//                                print '<tr>' ;
//                                echo "<td>" . $datensatz_mos_1["user_name"] . "</td>";
//                                echo "<td>" . "<input type='checkbox' name='friend_" . $datensatz_mos_1["user_id"] . "'" . "</td>";
//                                echo "</tr>" . "\n";
//                            }
//                        }
//                    print "</table>";
//                    print "<input type='submit'>" . "</form>" ;
//                }
            ?>
        <!--<form><se</form><option value="3" selected> Snipey </option>-->
        huhu
    </body>
</html>