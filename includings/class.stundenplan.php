<?php

class stundenplan extends Db implements Dmlable {

        /**
         * Methode um die Block-Zeiten aus der Datenbank zu lesen.
         * Diese werden als über ein Array zurück gegeben
         */

        public function get_Blocks() {


            //sql-Befehl zur ausgabe der Zeiten und des Blocks
            $sql = "SELECT block_nr, von, bis
                    FROM zeiten";
            $result = mysql_query($sql);


            /*
             * Fehlerbehandlung falls die Anfrage fehlt schlägt
             */
            if(!result) {
                echo "Die Anfrage ".$sql." ".
                     "konnte nicht bearbeitet werden".mysql_error();
            }

            /*
             * Datenbank ist leer ;)
             */

            if(mysql_num_rows($result)==0) {
                echo "Error: Anfrage wurde nicht durchgeführt,
                      da keine Zeilen zum ausgeben gefunden wurden";
            }

            /**
             * - Wenn alles glatt läuft gehts hier weiter:
             * - Alle Daten werden in ein Array ($ausgabe) geschrieben
             * - und mit return zurück gegeben
             */

            while($data = mysql_fetch_assoc($result)) {
                
                $ausgabe[$data['block_nr']] = $data;

             }

            return $ausgabe;            //Nachdem die While Schleife durchlaufen ist,
                                        //wird das array übergeben

            mysql_free_result($result); //Aufräumen
            $klabu_db->disconnect();    //Verbindung trennen

        }


        /**
         * Durch die Angabe der Klasse und des Datums,
         * werden alle Fächer der Klasse dargestellt
         */

        public function get_Tagesplan($klasse_id=0, $datum = "") {


            //sql-Befehl zur ausgabe der Zeiten und des Blocks
            $sql = "SELECT block_nr, datum, klasse_id,
                    raum_id, lehrer_id, vertretung_id, fach_id, block_nr
                    FROM wochenplan
                    WHERE klasse_id = ".$klasse_id." "."
                    AND datum = '".$datum."'";

            $result = mysql_query($sql);

            echo $sql;


            /*
             * Fehlerbehandlung falls die Anfrage fehlt schlägt
             */
            if(!result) {
                echo "Die Anfrage ".$sql.
                       " konnte nicht bearbeitet werden".mysql_error();
            }

            /*
             * Datenbank ist leer ;)
             */

            if(mysql_num_rows($result)==0) {
                echo "Error: Anfrage wurde nicht durchgeführt,
                      da keine Zeilen zum ausgeben gefunden wurden";
            }

            /**
             * - Wenn alles glatt läuft gehts hier weiter:
             * - Alle Daten werden in ein Array ($ausgabe) geschrieben
             * - und mit return zurück gegeben
             */


            while($data = mysql_fetch_assoc($result)) {

                $dummy['datum']=$data['datum'];
                $dummy['klasse']=db::resolve_Id(klasse, klasse_id, $data['klasse_id']);
                $dummy['raum']=db::resolve_Id(raume, raum_id, $data['raum_id']);
                $dummy['lehrer']=db::resolve_Lehrer($data['lehrer_id']);
                $dummy['fach']=db::resolve_Id(fach, fach_id, $data['fach_id']);
                $dummy['block_nr']=$data['block_nr'];

                //Vertretung nur Anzeigen falls eine Vertretung gewählt wurde
                if($data['vertretung_id']!=0) {
                $dummy['vertretung']=db::resolve_Lehrer($data['vertretung_id']); }

                $ausgabe[] = $dummy;

             }

            return $ausgabe;            //Nachdem die While Schleife durchlaufen ist,
                                        //wird das array übergeben

            mysql_free_result($result); //Aufräumen
            $klabu_db->disconnect();    //Verbindung trennen

        }

        /**
         * Auslesen der Lehrer, des Fachs und des Raums durch
         * angabe von klasse_id, Datum und der Blocknummer
         */

        public function get_LFR($klasse_id=0, $datum = "", $block_nr=0) {


            //Instanz der Klasse db zur Verbindung zur Datenbank
            $klabu_db = new db;


            //sql-Befehl zur ausgabe der Zeiten und des Blocks
            $sql = "SELECT block_nr, datum, klasse_id,
                    raum_id, lehrer_id, vertretung_id, fach_id FROM wochenplan
                    WHERE klasse_id = ".$klasse_id." "."
                    AND datum = '".$datum."' AND block_nr = ".$block_nr;

            $result = mysql_query($sql);

            echo $sql;


            /*
             * Fehlerbehandlung falls die Anfrage fehlt schlägt
             */
            if(!result) {
                echo "Die Anfrage ".$sql.
                       " konnte nicht bearbeitet werden".mysql_error();
            }

            /*
             * Datenbank ist leer ;)
             */

            if(mysql_num_rows($result)==0) {
                echo "Error: Anfrage wurde nicht durchgeführt,
                      da keine Zeilen zum ausgeben gefunden wurden";
            }

            /**
             * - Wenn alles glatt läuft gehts hier weiter:
             * - Alle Daten werden in ein Array ($ausgabe) geschrieben
             * - und mit return zurück gegeben
             */


            while($data = mysql_fetch_assoc($result)) {

                $dummy['block_nr']=$data['block_nr'];
                $dummy['datum']=$data['datum'];
                $dummy['klasse']=$klabu_db->resolve_Id(klasse, klasse_id, $data['klasse_id']);
                $dummy['raum']=$klabu_db->resolve_Id(raume, raum_id, $data['raum_id']);
                $dummy['lehrer']=$klabu_db->resolve_Lehrer($data['lehrer_id']);
                $dummy['fach']=$klabu_db->resolve_Id(fach, fach_id, $data['fach_id']);

                //Vertretung nur Anzeigen falls eine Vertretung gewählt wurde
                if($data['vertretung_id']!=0) {
                $dummy['vertretung']=$klabu_db->resolve_Lehrer($data['vertretung_id']); }

                $ausgabe[] = $dummy;

             }

            return $ausgabe;            //Nachdem die While Schleife durchlaufen ist,
                                        //wird das array übergeben

            mysql_free_result($result); //Aufräumen
            $klabu_db->disconnect();    //Verbindung trennen

        }

	public function save(){

        //Not Needed

	}

	public function insert(){

        //Not Needed

	}

	public function update(){

        //Not Needed

	}

	public function delete($id){

        //Not Needed

	}

	public function getAllAsArray($restriction = ''){

        //Not Needed

	}
        
	public function load($id){

        //Not Needed

	}

}

?>