<?php
    require 'includes/functions.php';
    include_once 'config.php';
    $qryString = $_POST['q'];
    $id = new InsertCost;
    $result = $id-> getprofDesc ($qryString) ;
    if(!empty($result)) {
?>
    <ul id="country-list">
<?php
        foreach($result as $country) {
?>
            <li onClick="selectCountry('<?php echo $country["description"]; ?>');"><?php echo $country["description"]; ?></li>
<?php 
                                     
         } 
?>
    </ul>
<?php 
    } 
?>

   