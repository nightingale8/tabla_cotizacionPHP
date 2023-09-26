<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TablaActualizada</title>
</head>
<body>
    <table width="50%" align="center" cellpadding="12px" cellspading="0px" border="2px">
        <thead bgcolor="#DC143C">
            <tr> 
                <th>No</th>
                <th>DEUDA</th>
                <th>ABONO</th>
                <th>INTERES</th>
                <th>CAPITAL + INTERES</th>
                <th>SALDO</th>
                <th>FECHA</th>
            </tr>

            </thead> 
            
            <tbody>

             <?php
              $deuda=($_GET["valorT"]);
              $pagos=($_GET["periodo"]);
              $interes=(($_GET["intAnual"])/100)/12;
              $saldo=$deuda;
              $monto=$deuda/$pagos;
              $fecha = date("d-m-Y");
                

             for ($i=1; $i<= $pagos ; $i++) {
            ?>
            <tr>
                <td align="center" bgcolor="#FFF8DC"><?php echo $i ?></td>
                <td align="center" bgcolor="#FFF8DC"><?php echo round($saldo, 2, PHP_ROUND_HALF_UP );?></td>
                <td align="center" bgcolor="#FFF8DC"><?php echo round($monto, 2, PHP_ROUND_HALF_UP ); ?></td>
                <td align="center" bgcolor="#FFF8DC"><?php echo round($saldo*$interes, 2, PHP_ROUND_HALF_UP ); ?></td>
                <td align="center" bgcolor="#FFF8DC"><?php echo round($monto+($saldo*$interes) , 2, PHP_ROUND_HALF_UP );?></td>
                <td align="center" bgcolor="#FFF8DC"><?php echo round($saldo-$monto, 2, PHP_ROUND_HALF_UP ); ?></td>
                <td align="center" bgcolor="#FFF8DC"><?php echo $fecha?></td>

                    <?php $saldo=$saldo-$monto;
                    $fecha = date("d-m-Y", strtotime($fecha."+ 1  month")); ?>
             </tr>
                    <?php
                     }
                     ?>  
            
            </tbody>
            
            
        </table>

</body>
</html>