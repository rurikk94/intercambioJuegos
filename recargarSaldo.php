<?php 
session_start();
if(!empty($_SESSION["NombreCompleto"])){
	
		require('conexion.php');
		$id_usuario_actual=$_SESSION["ID"];
		
		$sql="select *
			FROM transacciones
			WHERE id_usuario=$id_usuario_actual order by fecha desc
		";
		
		$transacciones=mysqli_query($conexion,$sql) or
                die("Problemas en el select:".mysqli_error($conexion));
                
		$arrayTransacciones = array();
		while($rowTransacciones = mysqli_fetch_array($transacciones)) {
			$arrayTransacciones[] = $rowTransacciones;
		}
		
		$row_cnt = mysqli_num_rows($transacciones);

		
		
?>
<!DOCTYPE HTML>
<html>
<?php include("head.php"); // incluyes el archivo head.php ?>
<body style="background-color:#000000;">
<?php include("menus.php");// incluyes el archivo menus.php ?>
<div class="container-fluid">
    <div class="row" >
        <div class="col-xs-8 col-xs-offset-2">
            <form action="webpay/webpay.php" style="color: black" method="post" enctype="multipart/form-data" onKeypress="if(event.keyCode == 13) event.returnValue = false;">
                <ol>
                
               <img src="http://i.imgur.com/BG70qAI.png" alt="Logo" id="imagen"/>
               
                <h2>Agregar Dinero</h2>
                <div id="TCP_AP">
                <input type="number" class="form-control" id="ejemplo_preg" name="nombre_categoria"   min="1000" value="">
                    <br /> 
					<br />
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Pagar</button>
                  
              
                </ol>
				</div>
            </form>
        
        </div>

		<div class="col-xs-8 col-xs-offset-2"  style="display: block;color: white" >
		<h2>Ultimo Movimientos</h2>
		<?php 
		if ($row_cnt>0){?>
		<table  class="table" style="background-color:#808080;color:black">
					<tr style="text-align: center;" class="success">
					  <th>Fecha</th>
					  <th>Tipo</th>
					  <th>Monto</th>
					  <th>Descripción</th>
					  
					</tr>
				<?php
				foreach($arrayTransacciones as $rowTransacciones){
				?>
					<tr class="active width=3500" style="color: black">
					  <td><?=$rowTransacciones["fecha"]?></td>
					  <td><?=$rowTransacciones["tipo"]?></td>
					  <td><?=$rowTransacciones["monto"]?></td>
					  <td><?=$rowTransacciones["descripcion"]?></td>
					</tr>
				<?php
				}
				?>
				</table>
		<?php
		
		}{
			echo "<h3>No existen Movimientos</h3>";
		}?>
		</div>
    </div>
<?php include("footer.php");// incluyes el archivo footer.php ?>
</body>
</html>
<?php
}else{
   header("Location: index.php");  
}
?>