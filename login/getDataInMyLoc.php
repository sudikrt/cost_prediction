<?php

    require 'includes/functions.php';
    include_once 'config.php';

    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $radius = $_POST ['radius'];
    $profDesc = $_POST ['profDesc'];
    
    $id = new InsertCost;
    $result = $id->getSearchData ($profDesc);
    $ary = array();
   
    if(!empty($result)) {
        $ary = array ();
        foreach($result as $link) {
            
            $compDetail =  $id->getCompData ($link["compCode"]);
            if (!empty ($compDetail)) {
                foreach($compDetail as $detail) {
                      //echo "Comp Name :- ".$detail['companyName']. "  Distance :-".distance($latitude, $longitude, $detail['latitude'], //$detail['longitude']) ;
                    if (distance($latitude, $longitude, $detail['latitude'], $detail['longitude']) < $radius) {
                        $ary[] = $detail;
                    } /*else {
                        echo "Not inside the radius";
                    }*/
                }
            } else {
                //echo "Invalid company";
            }
         }
        echo json_encode($ary);
        $compDetail = null;
        
    } else {
        //echo "No Data found";
    }


    function distance($lat1, $lon1, $lat2, $lon2) {
              $R = 6371; // Radius of the earth in km
              $dLat = ($lat2 - $lat1) * pi() / 180;  // deg2rad below
              $dLon = ($lon2 - $lon1) * pi() / 180;
              $a = 
                 0.5 - cos($dLat)/2 + 
                 cos($lat1 * pi() / 180) * cos($lat2 * pi() / 180) * 
                 (1 - cos($dLon))/2;

              return $R * 2 * asin(sqrt($a));
    }
    /*echo $latitude."\n";
    echo $longitude."\n";
    echo $profDesc."\n";
    echo $radius."\n";*/
?>