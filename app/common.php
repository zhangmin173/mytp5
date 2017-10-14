<?php

// 字符串转数组
function str2arr($str,$delimiter = ',')
{
	return explode($delimiter, $str); 
}

// 数组移除key
function array_remove($data, $key){  
    if(!array_key_exists($key, $data)){  
        return $data;  
    }  
    $keys = array_keys($data);  
    $index = array_search($key, $keys);  
    if($index !== FALSE){  
        array_splice($data, $index, 1);  
    }  
    return $data;  
}  