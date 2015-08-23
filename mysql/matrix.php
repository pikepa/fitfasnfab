<?php
$initVal = 15;
$rows = 6;
$cols = 6;
$matrix = array();
for($i = 0; $i < $rows; $i++) {
    if($i != 0)
        $initVal = round($matrix[$i-1][0]*1.6);
    $matrix[$i] = array();
    for($j = 0; $j < $cols; $j++) {
        if($j == 0) 
            $matrix[$i][$j] = $initVal;
        else
            $matrix[$i][$j] = round($matrix[$i][$j-1]*1.6);
    }
}

print_r($matrix);
?>