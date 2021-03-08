<?php

//This page is used for show the search for profile page

// This page is used for search database

if (isset($_GET["term"])) {
    $connect = new PDO("mysql:host=localhost; dbname=carhut", "root", "");

    $query = "
 SELECT * FROM tbl_product
 WHERE name LIKE '%" . $_GET["term"] . "%'
 ORDER BY name ASC
 ";

    $statement = $connect->prepare($query);

    $statement->execute();

    $result = $statement->fetchAll();

    $total_row = $statement->rowCount();

    $output = array();
    if ($total_row > 0) {
        foreach ($result as $row) {
            $temp_array = array();
            $temp_array['id'] = $row['id'];
            $temp_array['value'] = $row['name'];
            $temp_array['label'] = '<img src="' . $row['image'] . '" width="70" />&nbsp;&nbsp;&nbsp;' . $row['name'] . '';
            $output[] = $temp_array;
        }
    } else {
        $output['value'] = '';
        $output['label'] = 'No Record Found';
    }

    echo json_encode($output);
}