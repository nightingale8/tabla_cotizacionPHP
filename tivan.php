<?php 
$valor=1;
$var1="HOLA";
$var2="HOLA2";
$var3="HOLA3";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>FECHA</th>
            </tr>
        </thead>

        <tbody>
           <?php 
            $deuda=15000;
            $saldo=$deuda;
            $pagos=10;
            $monto=$deuda/$pagos;
            $interes=15;

            $tint=($interes/100)/12;
            $fecha = date("d-m-Y");
        

            for ($i=0; $i< $pagos ; $i++){
                    echo $i.'--';
                    echo $saldo.'--';
                    echo $monto.'--';
                    echo $saldo*$tint.'--';
                    echo $monto+$saldo*$tint.'--';
                    echo $fecha.'<br>';
                    $saldo=$saldo-$monto;
                    $fecha = date("d-m-Y", strtotime($fecha."+ 1  month"));
            }
           ?>
          
        </tbody>
        <?php
         for ($i=0;$i<5;$i++){
        ?>
            <tfoot>
                <tr>
                    <td><?php echo $var1?></td>
                    <td><?php echo $var2?></td>
                    <td><?php echo $var3?></td>
                </tr>
            </tfoot>
        <?php 
        }
        ?>
    </table>


    
</body>

</html>