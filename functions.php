<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function pripojeniDb() {
    If ($_SERVER['REMOTE_ADDR'] == "127.0.0.1") {
        $db = new mysqli('localhost', 'root', '', 'slevomat');
    } else {
        $db = new mysqli('localhost', 'slevomat.6', 'slevomat', 'slevomat_6');
    }

    return $db;
}

function vlozDb($money) {
    $query = "INSERT INTO slevomat SET date=NOW(), money=$money";
    $db = pripojeniDb();
    $db->query($query);
}

function nactiDb() {
    $query = "SELECT date as day, money FROM slevomat LIMIT 10";
    $db = pripojeniDb();
    $result = $db->query($query);
    while ($row = mysqli_fetch_assoc($result)) {
        //$date=new DateTime($row['day']);

        //$datumy[]=$date->format('d-m-Y');
        $datumy[]=$row['day'];
        $penize[]=intval($row['money']);
    }
    unset ($result);
    $result['datumy']=$datumy;
    $result['penize']=$penize;
    //print_r($result);
    return $result;
}

?>
