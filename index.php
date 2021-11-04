<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Castil</title>
    </head>
    <body>
        <form action="results.php" method="post">
            <p>Ingrese el país</p><input type="text" name="pais" id="pais"/>
            <p>Ingrese la región</p>
                        <select name="region" id="region">
                            <option value="Caribbean">Caribbean</option>
                            <option value="Eastern Africa">Eastern Africa</option>  
                            <option value="Eastern Asia">Eastern Asia</option>
                            <option value="Central America">Central America</option>                            
                        </select>
            <button type="submit">Enviar</button>
            <br><br><br>
        </form>
    </body>
</html>
