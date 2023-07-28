<?php
require('app/app.php');

$title='Devjobs-Home';

    if (isset($_GET['search'])) {
        $query = search_query1($_GET['search']);
    } else {
        $query = decode_data();
    }

view('index', $query);
?> 





        

