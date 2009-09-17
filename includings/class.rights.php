<?php

class rights {

    /**
     * Erster Paramter ist admin für Admin
     *                     lehrer für Lehrer
     *                     schueler für Schueler
     *                 und sekretärin für Sekretärin
     *
     * Der Zweite Paramteter gibt an welches level die Person hat.
     * 0 ist das default-level.
     */

    /**********UNTERTEILUNGEN******************************************************/
    /**/                                                                        /**/
    /**/    //ADMIN         ->  ALLES!                                          /**/
    /**/                                                                        /**/
    /**/    //SCHUELER      ->  LEVEL -> 0 ->   Profile lesen/(schreiben)!      /**/
    /**/    //                             ->   Eigene Noten1                   /**/
    /**/    //                             ->   Stundenberichtsheft!            /**/
    /**/    //                             ->   News!                           /**/
    /**/    //                             ->   Stundenplan!                    /**/
    /**/    //                             ->   Klassenübersicht!               /**/
    /**/    //                  LEVEL -> 1 ->   (Englisch)                      /**/
    /**/                                                                        /**/
    /**/    //LEHRER        ->  LEVEL -> 0 ->   Stundenplan (lesen)             /**/
    /**/    //                             ->   Anwesenheit (nachtragen)        /**/
    /**/    //                             ->   Stundenberichtsheft (kein FBL)  /**/
    /**/    //                             ->   Profile                         /**/
    /**/    //                             ->   Klassenübersicht                /**/
    /**/    //                             ->   News                            /**/
    /**/    //                             ->   Noten (eingeschränkt)           /**/
    /**/    //                  LEVEL -> 1 ->   Stundenberichtsheft (FBL)       /**/
    /**/    //                             ->   Klassen aktivieren/deaktivieren /**/
    /**/                                                                        /**/
    /**/    //Sekretärin                   ->   Anwesendheit!                   /**/
    /**/                                                                        /**/
    /******************************************************************************/


    //Ausgabe der Rechte als Array =)
    public function getRights($typ) {

        switch($typ)
        {
            case ADMIN:
                {
                    $rights = explode(",", ADMIN_RIGHTS);
                    break;
                }
                
            case FBL:
                {
                    $rights = explode(",", FBL_RIGHTS);
                    break;
                }

            case LEHRER:
                {
                    $rights = explode(",", LEHRER_RIGHTS);
                    break;
                }

            case SCHUELER:
                {
                    $rights = explode(",", SCHUELER_RIGHTS);
                    break;
                }

            case SEKRETAERIN:
                {
                    $rights = explode(",", SEKRETAERIN_RIGHTS);
                    break;
                }
                
            default:
                {
                    break;
                    // :) Reality is for people with no imagination!
                }
        }

    }

}

?>
