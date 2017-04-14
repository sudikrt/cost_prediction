<htm>
    <head>
        <title>Company Data</title>
    </head>
    <body>
        
        <center>
            <h1>Company Profile</h1>
            <form method="post" action="insertCompany.php">
                <table>
                    <tr>
                        <td align="center">
                            <input type="text" name="companyName" id="companyName" placeholder="Enter your company name" required/> 
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            <input type="text" name="latitude" id="latitude" placeholder="Enter Latitude" required/> 
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            <input type="text" name="longitude" id="longitude" placeholder="Enter Longitude" required/>
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            <textarea cols="16" rows="10" id="address" name="address" required placeholder="Tell us where are you located"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            <input type="number" name="yearOfExistance" id="yearOfExistance" placeholder="When is yout company started ?" required/>
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