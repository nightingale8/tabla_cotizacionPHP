<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<!--- construccion de la tabla--->

<?php 
        echo '<table withd="80%" align="center" cellpadding="12px" cellspading="0px" border="1px"';
        echo '<tr>';
        echo '<td align="center" bgcolor="#1D90EB" width=""'."<h3>"."No"."</h3>".'</td>';
        echo '<td align="center" bgcolor="#1D90EB" width=""'."<h3>"."DEUDA"."</h3>".'</td>';
        echo '<td align="center" bgcolor="#1D90EB" width=""'."<h3>"."ABONO"."</h3>".'</td>';
        echo '<td align="center" bgcolor="#1D90EB" width=""'."<h3>"."INTERES"."</h3>".'</td>';
        echo '<td align="center" bgcolor="#1D90EB" width=""'."<h3>"."CAPITAL+INTERES"."</h3>".'</td>';
        echo '<td align="center" bgcolor="#1D90EB" width=""'."<h3>"."SALDO"."</h3>".'</td>';
        echo '<td align="center" bgcolor="#1D90EB" width=""'."<h3>"."FECHA"."</h3>".'</td>';
        echo '</tr>';
    
        
        $numInicial = 1;
        $int= ($_POST["intAnual"])/100;
        $intM = $int / 12; //interes mensual porcentual
        $deuda = $_POST["valorT"];
        $abono = $_POST["valorT"] / $_POST["periodo"];


        $interes = $deuda * $intM;

        $capInt = $abono + $interes;

        $saldo = $deuda - $abono;

        $fecha = date("d-m-Y");

    
        

    do{ 

        if($numInicial==1){
       $numLimite = $_POST["periodo"];
        echo '<tr align= "center">';
        echo "<td> $numInicial </td>";
        echo "<td> $deuda</td>"; 
        echo "<td> $abono </td>";
        echo "<td> $interes </td>";
        echo "<td> $capInt </td>";
        echo "<td> $saldo </td>";
        echo "<td> $fecha</td>";
        }
        else if ($numInicial>1){
        $deuda = $saldo;
        $saldo = $deuda - $abono;
        $interes = $deuda * $intM;
        $capInt = $abono + $interes;
        $fecha = date("d-m-Y");
        $fecha = date("d-m-Y", strtotime($fecha."+ 1  month"));

        
        


        

        echo '<tr align= "center">';
        echo "<td> $numInicial </td>";
        echo "<td> $deuda</td>"; 
        echo "<td> $abono </td>";
        echo "<td> $interes </td>";
        echo "<td> $capInt </td>";
        echo "<td> $saldo </td>";
        echo "<td> $fecha </td>";
        }

        $numInicial++;
        $deuda-$abono;
        
        
       
        
        
        echo '</tr>';
    }
    //enumerar la tabla con el total de meses a pagar
        while($numInicial<=$numLimite);
        echo '</table>'
    ?>

</body>
</html>