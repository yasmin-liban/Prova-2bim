<html>
    <head>
        <meta charset="UTF-8">
        <link href="https://fonts.googleapis.com/css?family=Rubik&display=swap" rel="stylesheet"> 
        <title>Resultados</title> 
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <h1>Resultados:</h1>
<?php
    $ano = $_GET["ano"];
    $local = $_POST["local"];
    $f = fopen("violencia-domestica-df.csv","r");
    $d = fgetcsv($f);
    if($ano){
        $i = 1;
        while($d[$i]!=$ano){
            $i++;
            if($i>6){
                die("Desculpe! Mas esse dado não existe. Por favor volte e tente outro valor.");
            }
        }
        echo "<table> <tr> <th>$d[0]</th> <th>$d[$i]</th> </tr>";
        while($d){
            $d = fgetcsv($f);
            echo "<tr> <td>$d[0]</td> <td>$d[$i]</td> </tr>";
        }
    }else{
        while($d){
            if($d[0]==$local){
                echo "<table class=\"longo\"> <tr> <th>$d[0]</th> <th>$d[1]</th> <th>$d[2]</th> <th>$d[3]</th> <th>$d[4]</th> <th>$d[5]</th> <th>$d[6]</th> </tr>";
                echo "<tr> <td>$d[0]</td> <td>$d[1]</td> <td>$d[2]</td> <td>$d[3]</td> <td>$d[4]</td> <td>$d[5]</td> <td>$d[6]</td> </tr>";
                break;
            }
            else
                $d = fgetcsv($f);
        }
        die("Desculpe! Mas esse dado não existe. Por favor volte e tente outro valor.");
    }
?>
    </table>
</body>
</html>