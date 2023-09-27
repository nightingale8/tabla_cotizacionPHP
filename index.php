<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla Actualizada</title>
</head>
<body>
<section> <!--- ingresar datos --->
        
            
        <form  method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            VALOR TOTAL: <input type="text" name="valorT"><br>
            PERIODO: <input type="text" name="periodo"><br>
            INTERES ANUAL: <input type="text" name="intAnual"><br>
            
            <input type="submit" name="submit" value="Enviar Datos">
        </form>



    </section>

                <section> <!---Actualizacion auto de la tabla--->
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
             if(isset($_GET['submit'])){

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
                     }}
                     ?>  
            
            </tbody>
            
            
        </table>
                </section>
</body>
<style>
input[type=text], select {
  width: 10%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 10%;
  background-color: #DC143C;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {

  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
</html>