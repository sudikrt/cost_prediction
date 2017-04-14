<?php
    require 'includes/functions.php';
    include_once 'config.php';
    if ($_SERVER['REQUEST_METHOD']== "POST") {
        if (!empty($_POST)) {
            $expLevel = $_POST['expLevel'];
          
            $insertCompany = new InsertCost;
    
            $response = $insertCompany->putExperience ($expLevel);

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
        <title>Experience Input form</title>
    </head>
    <body>
        
        <center>
            <h1>Professions Input form</h1>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                <table>
                    <tr>
                        <td align="center">
                            <input type="text" name="expLevel" id="expLevel" placeholder="Enter ExpLevel" required/> 
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