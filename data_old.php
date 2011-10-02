<?php
include 'php-ofc-library/open-flash-chart.php';
include_once 'functions.php';

$result=nactiDb();

//print_r($result);

$graf=new open_flash_chart();


$title = new title("Slevomat" );

$bar = new line();
$bar->set_values($result['penize'] );

//$chart = new open_flash_chart();
$graf->set_title( $title );
$x=new x_axis();
$minDate=strtotime(current($result['datumy']));
//echo $minDate;
$maxDate=strtotime(end($result['datumy']));
//echo $maxDate;
$x->set_range($minDate,$maxDate,100);
//$x->set_range(    mktime(0, 0, 0, 1, 1, date('Y')),    mktime(0, 0, 0, 1, 31, date('Y'))    );
//$x->set_steps(60);
$labels = new x_axis_labels();
// tell the labels to render the number as a date
$labels->text('#date:d m Y H:i#');
// generate labels for every day
//$labels->set_steps(60);
// only display every other label (every other day)
$labels->visible_steps(2);
$labels->rotate(90);

// finally attach the label definition to the x axis
$x->set_labels($labels);
$y = new y_axis();
$min=current($result['penize']);
$max=end($result['penize']);

$y->set_range($min, $max, 100);
$y->set_steps(2);
$x->set_offset(true);

$graf->set_y_axis( $y );
$graf->set_x_axis($x);
$graf->add_element( $bar );
                    
echo $graf->toPrettyString();
?>
