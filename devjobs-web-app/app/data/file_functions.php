<?php
function get_data() {
    $fname = CONFIG['datafile'];

    if(!file_exists($fname)) {
        file_put_contents($fname, '');
    } else {
       $json = file_get_contents($fname);
    }

    return $json;
}

function get_detail_data($get){
    $detail = decode_data();

    foreach($detail as $data){
        if($data->company == $get){
            return $data;
        }
    }
    return false;
}

function decode_data(){
    $json = get_data();

    return json_decode($json);
}

/* function search_data($get_search, $get_location) {



} */



function search_query1($get_search) {
    $array = decode_data();


    $search_array = array_filter($array, function($arr_parameter) use($get_search){
        if(strpos($arr_parameter->company, $get_search) !== false || strpos($arr_parameter->location, $get_search) !== false || strpos($arr_parameter->position, $get_search) !== false){
            return $arr_parameter;
        }
    });

    return $search_array;
}


function search_query2($get_location) {
    $array = decode_data();

    $location_array = array_filter($array, function($arr_parameter2) use($get_location){
        if(strpos($arr_parameter2->company, $get_location) !== false || strpos($arr_parameter2->location, $get_location) !== false || strpos($arr_parameter2->position, $get_location) !== false){
            return $arr_parameter2;
        }
    });

        return $location_array;
}

?>





