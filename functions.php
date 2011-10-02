<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function pripojeniDb() {
    $db = new mysqli('localhost', 'root', '', 'slevomat');
    return $db;
}

function vlozDb($money) {
    $query = "INSERT INTO slevomat SET date=NOW(), money=$money";
    $db=pripojeniDb();
    $db->query($query);
}

?>
