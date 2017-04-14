<?php
    require 'includes/functions.php';
    include_once 'config.php';
    if ($_SERVER['REQUEST_METHOD']== "POST") {
        if (!empty($_POST)) {
            $profCode = $_POST['profCode'];
            $description = $_POST['description'];  
            
            $insertCompany = new InsertCost;
    
            $response = $insertCompany->putProfession ($profCode, $description);

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
        <title>Professions Input form</title>
    </head>
    <body>
        
        <center>
            <h1>Professions Input form</h1>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                <table>
                    <tr>
                        <td align="center">
                            <input type="text" name="profCode" id="profCode" placeholder="Enter profCode" required/> 
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            <input type="text" name="description" id="description" placeholder="Enter Description" required/> 
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