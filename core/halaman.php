<?php

require_once "core/init.php";

function getPage_stock($final, $page, $perpage) 
{ 
    $offset = ($page - 1) * $perpage; 
    $rows = array(); 
    $i = 0; 
    while($row = sqlsrv_fetch_array($final, 
                                    SQLSRV_FETCH_NUMERIC, 
                                    SQLSRV_SCROLL_ABSOLUTE, 
                                    $offset + $i) 
           && $i < $perpage) 
    { 
        array_push($rows, $row); 
        $i++; 
    } 
    return $rows; 
}
?>