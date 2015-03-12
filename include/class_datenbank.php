<!DOCTYPE php>
<?php
/**
 * Description of class_datenbank
 *
 * @author mos
 */
include 'mysql_config.inc.php';

    $verbindung = NULL ;
    $dbaktiv = '' ;
    class datenbank {
        // Datenbankserver
        var $mysql_host = 'localhost' ;
        // Datenbankbenutzername
        var $mysql_user = '$mysqluser' ;
        // Datenbankpasswort
        var $mysql_passwort = '$mysqlpass';
        // Datenbankname speichern
        var $dbname = '' ;
        function datenbank( $name ) {
            // diese Funktion wird nur beim Initialiseren der Klasse aufgerufen
            // Variable $verbindung mit global einbinden
            global $verbindung ;
            // Datenbankname in $dbname speichern
            $this->dbname = $name ;
            /* 
             * abfragen ob Verbindung zum Server bereits besteht, wenn nicht
             * Verbindung herstellen
             */
            if(!$verbindung) $verbindung = @mysql_connect( $this->mysql_host, $this->mysql_user, $this->mysql_passwort) ;
            // haben wir Verbindung zum Datenbankserver? wenn nein Fehlermeldung
            if(!$verbindung) die("Keine Verbindung zum Datenbankserver") ;
                }
            }
    // hier die Funktion die eine Verbindung zu einer Datenbank herstellt
    function connect_db( $name) {
        // Variable $verbindung und $dbaktiv einbinden
        global $verbindung, $dbaktiv ;
        // Datenbank $name Verbindung herstellen
        $result = @mysql_select_db( $name, $verbindung) ;
        // haben wir Datenbankverbindung? wenn nein Fehlermeldung
        if(!$result) {
            die("Datenbank ".$name." nicht vorhanden.") ;
            }
        // Datenbankverbindung besteht, aktuellen Datenbanknamen speichern
        else {
            $dbaktiv = $name ;
            }
        }
    function abfrage( $befehl) {
        // wieder per global $dbaktiv einbinden
        global $dbaktiv ;
        /* ist der in $dbname gespeicherte Datenbankname nicht der aktuelle?
         * dannFunktion connect_db() aurufen
         */
        if($this->dbname!=$dbaktiv) {
            $this->connect_db( $this->dbname) ;
            }
        /*
         *  Aufruf der PHP-Funktion mysql_query() um den SQL Befehl abzuarbeiten
         *  und die Resourcen-Kennung zurück geben
         */
        return mysql_query( $befehl) ;
        }
    function lade_satz( $id) { 
        return mysql_fetch_array($id); 
        }
?>