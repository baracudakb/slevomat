<?php

    include_once 'simple_html_dom.php';
    include_once 'functions.php';

    //Parsování stránky
    $stranka = new simple_html_dom();
    $stranka->load_file('http://www.slevomat.cz');
    $data = $stranka->find('.claim', 0);

    //Ořezání znaků
    $string = $data->plaintext;
    $string = ltrim(strstr($string, ':'), ':');
    $pocet = strlen($string);
    $pocet = $pocet - 5;
    $string = substr($string, 1, $pocet);
    $string = str_replace(' ', '', $string);
    
    //Převod na číslo
    $cislo = (int) $string;
    
    //Uložení do DB
    vlozDb($cislo);

?>
