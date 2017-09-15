<?php
    $address  = $_REQUEST['address'];

    $json_arr = array ();

    if (empty ($address)) {
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
    # echo json_encode ($json_arr);

    $url = "http://nominatim.openstreetmap.org/search.php?q=$city%2C+$country&polygon_geojson=1";

    # echo $url;

    // $website = file_get_contents ($url, NULL, NULL, 0);

    $url           = preg_replace("/ /", "%20", $url);

    $mapwebsite    = file_get_contents ($url);

    $button        = explode ('<a class="btn btn-default btn-xs details" href=', $mapwebsite);

    $detailsarr    = explode ('>details', $button[1]);

    // $detailsurl    = 'http://nominatim.openstreetmap.org/' . substr ($detailsarr[0], 1, count($detailsarr[0]) - 2);

    $id            = substr ($detailsarr[0], 22, count($detailsarr[0]) - 2);

    // $polygonurl = "http://polygons.openstreetmap.fr/index.py?id=$id";

    $polygonurl = "get_geojson.py?id=$id";

    // var_dump ($polygonurl);

    $polygonwebsite = file_get_contents ($polygonurl);

    // var_dump ($polygonwebsite);

    $json_url = explode ('<a href="', $polygonwebsite);

    var_dump ($json_url);
?>
