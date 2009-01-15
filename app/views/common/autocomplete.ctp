<?php
    foreach ($results As $k=>$v) {
        $value='';
        foreach ($fields As $i =>$j) {
            $value .= '"'.$v[$model][$j].'",';
        }
        echo "<li onclick='set_".$input_id."(".substr($value,0,strlen($value)-1).")'><a href='#'>".$v[$model][$search]."</a></li>";
    }
?> 