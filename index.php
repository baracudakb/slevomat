<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include_once 'simple_html_dom.php';
        include_once 'functions.php';
        $stranka = new simple_html_dom();
        $stranka->load_file('http://www.slevomat.cz');
        $data=$stranka->find('.claim',0);

        $string= $data->plaintext;
        $string=ltrim(strstr($string,':'),':');
        $pocet=strlen($string);
        $pocet=$pocet-5;
        $string=  substr($string, 1, $pocet);
        $string=str_replace(' ','',$string);
        $cislo=(int) $string;
        vlozDb($cislo);
        ?>
    </body>
</html>
