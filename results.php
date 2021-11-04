<?php
    $pais = $_POST["pais"];
    $region = $_POST["region"];

    echo $pais;
    echo $region;
    
    $servername = "localhost";
    $username = "root";
    $password = "mysql";
    $dbname = "world";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT ciudad.name, ciudad.population, pais.name, pais.region FROM city ciudad INNER JOIN \n" .
           "country pais ON ciudad.CountryCode = pais.code WHERE pais.region = '" . (string)$region ."' AND \n" .
           "pais.name LIKE '%" . (string)$pais . "%' ORDER BY pais.name";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) { 
    
    $file_ending = "xls";
    $filename = "datos";
    //header info for browser
    header("Content-Type: application/xls");    
    header("Content-Disposition: attachment; filename=$filename.xls");  
    header("Pragma: no-cache"); 
    header("Expires: 0");
    /*******Start of Formatting for Excel*******/   
    //define separator (defines columns in excel & tabs in word)
    $sep = "\t"; //tabbed character
    //start of printing column names as names of MySQL fields
    while ($property = mysqli_fetch_field($result)) {
        echo $property->name . "\t";
    }
    print("\n");    
    //end of printing column names  
    //start while loop to get data
        while($row = mysqli_fetch_row($result))
        {
            $schema_insert = "";
            for($j=0; $j<mysqli_num_fields($result);$j++)
            {
                if(!isset($row[$j]))
                    $schema_insert .= "NULL".$sep;
                elseif ($row[$j] != "")
                    $schema_insert .= "$row[$j]".$sep;
                else
                    $schema_insert .= "".$sep;
            }
            $schema_insert = str_replace($sep."$", "", $schema_insert);
            $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
            $schema_insert .= "\t";
            print(trim($schema_insert));
            print "\n";
        }   

    }
    
    ?>
