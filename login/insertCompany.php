<?php
    require 'includes/functions.php';
    include_once 'config.php';

    $companyName = $_POST['companyName'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $address = $_POST['address'];
    $yearOfExistance = $_POST['yearOfExistance'];
    
    $insertCompany = new InsertCost;
    
    $response = $insertCompany->putCompany ($companyName, $latitude, $longitude, $address, $yearOfExistance);

    
    if ($response == 'true') {
		echo "inserted";
    } else {
            //Failure
            mySqlErrors($response);
    } 
?>