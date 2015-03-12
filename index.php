<?php
//session_start();
?>
<!DOCTYPE html>
<?php
    include 'include/mysql_config.inc.php';
?>
<html>
    <head>
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
        <title>Welcome to <?php print $name ?>!</title>
        <style>
        body {
            width: 40em;
            margin: 0 auto;
            font-family: Tahoma, Verdana, Arial, sans-serif;
        }
        </style>
    </head>
    <body>
        <h3>Welcome to <?php print $name; ?>!</h3>
        <h4>You are at <?php print $wami;?></h4>
        <p>playing with mysql</p>
        <table>
            <tr>
                <td>Server</td>
                <td>=</td>
                <td><?php print $serverip ; ?></td>
            </tr>
            <tr>
                <td>User</td>
                <td>=</td>
                <td><?php print $mysqluser ; ?></td>
            </tr>
            <tr>
                <td>Password</td>
                <td>=</td>
                <td><?php print $mysqlpass ; ?></td>
            </tr>
            <tr>
                <td>Database</td>
                <td>=</td>
                <td><?php print $database_name ; ?></td>
            </tr>
            <tr>
                <td>Tabelle</td>
                <td>=</td>
                <td><?php print $tbl_1; ?></td>
            </tr>
        </table>
        <?php
            mysql_connect("$serverip","$mysqluser","$mysqlpass");
            mysql_select_db("$database_name");
            $mos_1 = mysql_query("select * from mos_1 ORDER BY user_name");
            $num = mysql_num_rows($mos_1);
        ?>
        <hr>
        <table>
            <tr>
                <td>Datenbank</td>
                <td>:</td>
                <td><?php print "$database_name";?></td>
            </tr>
            <tr>
                <td>Tabelle</td>
                <td>:</td>
                <td><?php print "$tbl_1";?></td>
            </tr>
            <tr>
                <td>Datensätze</td>
                <td>:</td>
                <td><?php echo $num . " Datensätze: <br />"; ?></td>
            </tr>
        </table>
        <table title="<?php print "$database_name" . ":" . "$tbl_1" ;?>" border='1'>
            <thead><?php print "$database_name" . ":" . "$tbl_1" ;?></thead>
            <tr>
                <th>ID</th><th>Name</th><th>Hash</th>
            </tr>
            <?php
            while ($datensatz_mos_1 = mysql_fetch_assoc($mos_1))
                {
                    print '<tr>' ;
                    print "<td>" . $datensatz_mos_1["user_id"] . "</td>";
                    echo "<td>" . $datensatz_mos_1["user_name"] . "</td>";
                    echo "<td>" . $datensatz_mos_1["user_hash_name"] . "</td>";
                    echo "</tr>" . "\n";
            }
        ?>
        </table>
        <form method="post">
            <p>
                <input
                    name="new_name" maxlength="20" /> Benutzername
            </p>
            <p>
                <input type="submit" />
                <input type="reset" />
            </p>
        </form>
        <?php
            if (isset($_POST["new_name"]))
                {
                $new_name = $_POST["new_name"];
                if ($new_name != "")
                {
                    mysql_connect("$serverip","$mysqluser","$mysqlpass");
                    mysql_select_db("mos");
                    $new_name = $_POST["new_name"];
                    $sql_action = "INSERT INTO `mos`.`mos_1`"
                            . " (`user_id`, `user_name`, `user_hash_name`)"
                            . " values "
                            . "(NULL, '" . $new_name . "', MD5('" . $new_name . "'));";
                    mysql_query($sql_action);

                    $num = mysql_affected_rows();
                    if ($num > 0)
                    {
                        print "<p>$new_name wurde zur Datenbank hinzugefügt</p>";
                    }
                    else
                    {
                        print "<p>Fehler bei der Transaktion</p>";
                        print "\"$new_name\" konnte nicht eingefügt werden.";
                    }
                }
                else
                {
                    print "Fehler, kein Wert übergeben!";
                }
                
            }
        ?>
        <p><a href="make_friends.php">make friends</a></p>
        <p><em>Thank you for visiting.</em></p>
    </body>
</html>