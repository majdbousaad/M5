<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/gericht.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/zahlen.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/newsletter.php');

/* Datei: controllers/HomeController.php */
class HomeController
{
    public function index(RequestData $request) {
        return view('home', ['rd' => $request ]);
    }
    
    public function debug(RequestData $request) {
        return view('debug');
    }

    public function emensa(RequestData  $rd){
        update_besucher();
        $gerichte = zufaellige_gerichte();
        $allerge_codes = codes_from_zufaellige_gerichte($gerichte);

        $zahlen_gerichte = db_zahlen_gerichte();
        $zahlen_anmeldungen = db_zahlen_anmeldungen();
        $zahlen_besucher = db_zahlen_besucher();


        return view('emensa.index', [
            'rd' => $rd,
            'gerichte' => $gerichte,
            'allerge_codes' => $allerge_codes,
            'zahlen_gerichte' => $zahlen_gerichte,
            'zahlen_anmeldungen' => $zahlen_anmeldungen,
            'zahlen_besucher' => $zahlen_besucher
        ]);
    }
    public function newsletter(RequestData $rd){

        $msgs = anmelden($rd);
        $erfolgreich = false;
        if(count($msgs) == 0){
            $erfolgreich =true;
        }

        $gerichte = zufaellige_gerichte();
        $allerge_codes = codes_from_zufaellige_gerichte($gerichte);

        $zahlen_gerichte = db_zahlen_gerichte();
        $zahlen_anmeldungen = db_zahlen_anmeldungen();
        $zahlen_besucher = db_zahlen_besucher();


        return view('emensa.index', [
            'rd' => $rd,
            'erfolgreich' => $erfolgreich,
            'msgs' => $msgs,
            'gerichte' => $gerichte,
            'allerge_codes' => $allerge_codes,
            'zahlen_gerichte' => $zahlen_gerichte,
            'zahlen_anmeldungen' => $zahlen_anmeldungen,
            'zahlen_besucher' => $zahlen_besucher
        ]);
    }

    public function wunschgericht(RequestData $rd){

    }

}