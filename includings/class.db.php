<?php

abstract class db{

    public function __construct() {

            // Verbindung zum Datenbankserver aufbauen
            $link = mysql_connect ( DB_SERVER, DB_USER, DB_PASSWD );
            if (! $link) {

                    throw new MysqlException ( );

            }

            // Datenbank ausw?hlen
            $db = mysql_select_db ( DB_NAME );
            if (! $db) {

                    throw new MysqlException ( );

            }

    }		

    public function resolve_Id($FROM='', $ID='', $ID_INT=0) {
        
        $sql = "SELECT name FROM ".$FROM." WHERE ".$ID."=".$ID_INT;

        $result = mysql_query($sql);

        /*
         * Fehlerbehandlung falls die Anfrage fehlt schl�gt
         */
        if(!result) {
            echo "Die Anfrage ".$sql.
                 " konnte nicht bearbeitet werden".mysql_error();
        }

        /*
         * Datenbank ist leer ;)
         */

        if(mysql_num_rows($result)==0) {
            echo "Error: Anfrage wurde nicht durchgef�hrt,
                  da keine Zeilen zum ausgeben gefunden wurden";
        }

         while($data = mysql_fetch_assoc($result)) {

         $ausgabe = $data['name'];

         }

        return $ausgabe;

        mysql_free_result($result); //Aufr�umen
        $this->disconnect();    //Verbindung trennen
        
    }

    public function resolve_Lehrer($ID_INT=0) {

        $sql = "SELECT vorname, nachname FROM lehrer WHERE lehrer_id =".$ID_INT;

        $result = mysql_query($sql);

        /*
         * Fehlerbehandlung falls die Anfrage fehlt schl?gt
         */
        if(!result) {
            echo "Die Anfrage ".$sql.
                 " konnte nicht bearbeitet werden".mysql_error();
        }

        /*
         * Datenbank ist leer ;)
         */

        if(mysql_num_rows($result)==0) {
            echo "Error: Anfrage wurde nicht durchgef?hrt,
                  da keine Zeilen zum ausgeben gefunden wurden";
        }

         while($data = mysql_fetch_assoc($result)) {

         $ausgabe = $data['vorname']." ".$data['nachname'];

         
         }

        return $ausgabe;

        mysql_free_result($result); //Aufr?umen
        $this->disconnect();    //Verbindung trennen

    }

    //Trennen der Verbindung
    public function disconnect() {
        mysql_close();
    }
}

?>
