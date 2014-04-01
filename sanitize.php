<?php

function sanitize($input){
    $result = array();
    foreach ($input as $key => $value){
        
    $value = trim($value);
    $value = stripslashes($value);
    $value = htmlspecialchars($value);
    
    $result[$key] = $value;
    
    }
    
    return $result;
    
}