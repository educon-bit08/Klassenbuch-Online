<?php

//Datensätze für die Datenbankverbindung

define('DB_SERVER', "localhost");
define('DB_USER', "p106991d2");
define('DB_PASSWD', "schueler");
define('DB_NAME', "usr_p106991_3");



/*****************RECHTE*****************/
/**/                                  /**/
/**/                                  /**/
/**/ //     Rechtevergabe-Datei       /**/
/**/                                  /**/
/**/ //     Hier wird definiert       /**/
/**/ //     welcher TYP von user      /**/
/**/ //     was genau sehen darf      /**/
/**/                                  /**/
/**/                                  /**/
/**/ //     Wichtig!!!                /**/
/**/ //     Bitte kein Leerzeichen    /**/
/**/ //     hinter dem Komma setzen!  /**/
/**/                                  /**/
/**/                                  /**/
/****************************************/

define ('ADMIN_RIGHTS',"FEHLZEITEN,STUNDENPLAN,BERICHTSHEFT,KLASSENLISTE,MEINE_SEITE,EINSTELLUNGEN,PROFILSUCHE,NEWS,NOTENLISTE,BERICHTSEINTRAGUNG,ANWESENHEIT,NACHTRAGUNGEN,KLASSENLISTE_ZUM_DRUCKEN,BENUTZER,KLASSEN,FAECHER,WOCHENPLANER");
define ('FBL_RIGHTS', "FEHLZEITEN,STUNDENPLAN,BERICHTSHEFT,KLASSENLISTE,MEINE_SEITE,EINSTELLUNGEN,PROFILSUCHE,NEWS,NOTENLISTE,BERICHTSEINTRAGUNG,ANWESENHEIT,NACHTRAGUNGEN,KLASSENLISTE_ZUM_DRUCKEN");
define ('LEHRER_RIGHTS', "FEHLZEITEN,STUNDENPLAN,BERICHTSHEFT,KLASSENLISTE,MEINE_SEITE,EINSTELLUNGEN,PROFILSUCHE,NEWS,NOTENLISTE,BERICHTSEINTRAGUNG,ANWESENHEIT,NACHTRAGUNGEN,KLASSENLISTE_ZUM_DRUCKEN");
define ('SCHUELER_RIGHTS', "FEHLZEITEN,STUNDENPLAN,BERICHTSHEFT,KLASSENLISTE,MEINE_SEITE,EINSTELLUNGEN,PROFILSUCHE,NEWS,NOTENLISTE,BERICHTSEINTRAGUNG");
define ('SEKRETAERIN_RIGHTS', "ANWESENHEIT");

$weekdays = 6; //anzahl wochentage
define ('WEEKDAYS', 6);
define ('BLOCKANZAHL', 8);

// fŸr Spreadsheet Excel Reader
define('Spreadsheet_Excel_Reader_BIFF8', 0x600);
define('Spreadsheet_Excel_Reader_BIFF7', 0x500);
define('Spreadsheet_Excel_Reader_WorkbookGlobals', 0x5);
define('Spreadsheet_Excel_Reader_Worksheet', 0x10);

define('Spreadsheet_Excel_Reader_Type_BOF', 0x809);
define('Spreadsheet_Excel_Reader_Type_EOF', 0x0a);
define('Spreadsheet_Excel_Reader_Type_BOUNDSHEET', 0x85);
define('Spreadsheet_Excel_Reader_Type_DIMENSION', 0x200);
define('Spreadsheet_Excel_Reader_Type_ROW', 0x208);
define('Spreadsheet_Excel_Reader_Type_DBCELL', 0xd7);
define('Spreadsheet_Excel_Reader_Type_FILEPASS', 0x2f);
define('Spreadsheet_Excel_Reader_Type_NOTE', 0x1c);
define('Spreadsheet_Excel_Reader_Type_TXO', 0x1b6);
define('Spreadsheet_Excel_Reader_Type_RK', 0x7e);
define('Spreadsheet_Excel_Reader_Type_RK2', 0x27e);
define('Spreadsheet_Excel_Reader_Type_MULRK', 0xbd);
define('Spreadsheet_Excel_Reader_Type_MULBLANK', 0xbe);
define('Spreadsheet_Excel_Reader_Type_INDEX', 0x20b);
define('Spreadsheet_Excel_Reader_Type_SST', 0xfc);
define('Spreadsheet_Excel_Reader_Type_EXTSST', 0xff);
define('Spreadsheet_Excel_Reader_Type_CONTINUE', 0x3c);
define('Spreadsheet_Excel_Reader_Type_LABEL', 0x204);
define('Spreadsheet_Excel_Reader_Type_LABELSST', 0xfd);
define('Spreadsheet_Excel_Reader_Type_NUMBER', 0x203);
define('Spreadsheet_Excel_Reader_Type_NAME', 0x18);
define('Spreadsheet_Excel_Reader_Type_ARRAY', 0x221);
define('Spreadsheet_Excel_Reader_Type_STRING', 0x207);
define('Spreadsheet_Excel_Reader_Type_FORMULA', 0x406);
define('Spreadsheet_Excel_Reader_Type_FORMULA2', 0x6);
define('Spreadsheet_Excel_Reader_Type_FORMAT', 0x41e);
define('Spreadsheet_Excel_Reader_Type_XF', 0xe0);
define('Spreadsheet_Excel_Reader_Type_BOOLERR', 0x205);
define('Spreadsheet_Excel_Reader_Type_UNKNOWN', 0xffff);
define('Spreadsheet_Excel_Reader_Type_NINETEENFOUR', 0x22);
define('Spreadsheet_Excel_Reader_Type_MERGEDCELLS', 0xE5);

define('Spreadsheet_Excel_Reader_utcOffsetDays' , 25569);
define('Spreadsheet_Excel_Reader_utcOffsetDays1904', 24107);
define('Spreadsheet_Excel_Reader_msInADay', 24 * 60 * 60);

//define('Spreadsheet_Excel_Reader_DEF_NUM_FORMAT', "%.2f");
define('Spreadsheet_Excel_Reader_DEF_NUM_FORMAT', "%s");

define('NUM_BIG_BLOCK_DEPOT_BLOCKS_POS', 0x2c);
define('SMALL_BLOCK_DEPOT_BLOCK_POS', 0x3c);
define('ROOT_START_BLOCK_POS', 0x30);
define('BIG_BLOCK_SIZE', 0x200);
define('SMALL_BLOCK_SIZE', 0x40);
define('EXTENSION_BLOCK_POS', 0x44);
define('NUM_EXTENSION_BLOCK_POS', 0x48);
define('PROPERTY_STORAGE_BLOCK_SIZE', 0x80);
define('BIG_BLOCK_DEPOT_BLOCKS_POS', 0x4c);
define('SMALL_BLOCK_THRESHOLD', 0x1000);
// property storage offsets
define('SIZE_OF_NAME_POS', 0x40);
define('TYPE_POS', 0x42);
define('START_BLOCK_POS', 0x74);
define('SIZE_POS', 0x78);
define('IDENTIFIER_OLE', pack("CCCCCCCC",0xd0,0xcf,0x11,0xe0,0xa1,0xb1,0x1a,0xe1));
?>
