<?php
    require 'includes/functions.php';
    include_once 'config.php';
    if ($_SERVER['REQUEST_METHOD']== "POST") {
        if (!empty($_POST)) {
            $profCode = $_POST['profCode'];
            $compCode = $_POST['compCode'];  
            $startDate = $_POST['startDate'];
            $endDate  = $_POST['endDate'];
            $expLevel = $_POST['expLevel'];
            $locationCode = ""; //$_POST['locationCode'];
            $pricePerhour = $_POST['pricePerhour'];
            
            $insertCompany = new InsertCost;
    
            $response = $insertCompany->putStasticalData ($profCode, $compCode, $startDate, $endDate, $expLevel, $locationCode, $pricePerhour);

            if ($response == 'true') {
                echo "inserted";
            } else {
                    mySqlErrors($response);
            } 
        }        
    }
?>
<htm>
    <head>
        <title>Stastical Data Info Form</title>
        
        <link rel="stylesheet" href="css/jquery-ui.css">
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery-ui.min.js"></script>
        <script>
         $(document).ready(function() {
			$("#startDate").datepicker();
		  });
            
        $(document).ready(function() {
			$("#endDate").datepicker();
		  });
        </script>
    </head>

    <body>        
        <center>
            
            
            <h1>Stastical Data Info Form</h1>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                <table>
                    <tr>
                        <td align="center">
                            <select onchange="document.getElementById('profCode').value = this.value">
                                <?php
                                        $id = new InsertCost;
                                        $result = $id->getprofCode();
                                                foreach ($result as $row => $link) {
                                ?>

                                    <option id="<?php echo $link['profCode'];?>"><?php echo $link['profCode'];?></option>

                                <?php	
                                        }
                                 ?>
                            </select>
                            
                            <input type="text" name="profCode" id="profCode" placeholder="Enter profCode" readonly required/> 
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            <select onchange="document.getElementById('compCode').value = this.value">
                                <?php
                                        $id = new InsertCost;
                                        $result = $id->getCompCode();
                                                foreach ($result as $row => $link) {
                                ?>

                                    <option id="<?php echo $link['compCode'];?>"><?php echo $link['compCode'];?></option>

                                <?php	
                                        }
                                 ?>
                            </select>
                            <input type="text" name="compCode" id="compCode" placeholder="Enter Company code" readonly required/> 
                        </td>
                    </tr>
                    
                    <tr>
                        <td align="center">
                            <select onchange="document.getElementById('expLevel').value = this.value">
                                
                                <?php
                                        $id = new InsertCost;
                                        $result = $id->getExpLevel();
                                                foreach ($result as $row => $link) {
                                ?>

                                    <option id="<?php echo $link['expLevel'];?>"><?php echo $link['expLevel'];?></option>

                                <?php	
                                        }
                                 ?>
                            </select>
                            
                            <input type="text" name="expLevel" id="expLevel" placeholder="Enter ExpLevel" required/> 
                        </td>
                    </tr>
                    
                     <tr>
                        <td align="center">
                            <input type="text" name="startDate" id="startDate" placeholder="Enter StartDate" required/> 
                        </td>
                    </tr>
                     <tr>
                        <td align="center">
                            <input type="text" name="endDate" id="endDate" placeholder="Enter EndDate" required/> 
                        </td>
                    </tr>
                    
                    <tr>
                        <td align="center">
                            <input type="number" name="pricePerhour" id="pricePerhour" placeholder="Enter pricePerhour" required/> 
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            <input type="submit" value="Submit"/>
                        </td>
                    </tr>
                </table>
            </form>
        </center>
    </body>
</htm>