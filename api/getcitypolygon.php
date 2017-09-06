<?php
    $address  = $_REQUEST['address'];

    $json_arr = array ();

    if (empty ($address))) {
        $json_arr['status'] = "failure";
        echo (json_encode ($json_arr));
        die ();
    }

    $arr     = explode (",", $address);

    if (count ($arr) < 2) {
        $json_arr['status'] = "failure";
        echo (json_encode ($json_arr));
        die ();
    }

    $city    = $arr[1];
    $country = $arr[count ($arr) - 1];

    $json_arr['status'] = "success";
    echo ($json_arr);

    $url = "http://nominatim.openstreetmap.org/search.php?q=$city%2C+$country&polygon_geojson=1";
?>
