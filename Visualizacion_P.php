<?php 
session_start();
if(!empty($_SESSION["NombreCompleto"])){
$nombrecompleto=$_SESSION["NombreCompleto"];
$resultadoPreguntas=$_SESSION["Respuestas"]; 
include("Busqueda_T.php");
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" charset="utf-8"/>
	<meta name="author" content="www.intercambiosvirtuales.org" />
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="estilo.css" rel="stylesheet">
    <link href='iconoH.png' rel='shortcut icon' type='image/png'>
    <script src="ckeditor/ckeditor.js"></script>

	<title>Visualizar Prueba</title>
</head>

<body class="fondo">
<div class="container-fluid">
    <div class="franja"></div>
    <div class="menu">
        <div class="row">
            <div class="col-xs-3">
                <img src="icono.png" alt="Insignia" id="imagen"/>
            </div>
            <div class="col-xs-7" id="texto">
                <h1 class="titulo">Bienvenido Profesor <?=$nombrecompleto?></h1>
                <h3 class="titulo2">Colegio Esperanza de Quilpué</h3>
            </div>
            <div class="col-xs-2" id="texto" style="padding-top: 1%;">
                <h4 class="sesion"><b>Sesion Iniciada</b></h4>
                <h4  class="sesion" style="padding-top: 30px;"><a type="submit" href="CambiarContrasena.php" style="color: white; width:100px; height:100px" onMouseover="this.style.color='blue'" onMouseout="this.style.color='white'">Cambiar Contraseña</a></h4>
            </div>
        </div>
    </div>
    <div class="menu">
        <div class="row">
            <div class="col-xs-12">
                <div class="tamaño">
                    <div class="btn-group">
                    <a type="submit" href='buscar_juego.php' class="btn btn-primary btn-lg">Buscar Videojuegos</a>
                        <a type="submit" href='agregar_categoria.php' class="btn btn-primary btn-lg">Agregar Categoria</a>
                        <a type="submit" href='agregar_juego.php' class="btn btn-primary btn-lg active">Agregar Videojuego</a>   
                        <a type="submit" href='#' class="btn btn-primary btn-lg">Intercambiar Videojuegos</a>
                        <a type="submit" href='#' class="btn btn-primary btn-lg">Modificar Usuario</a>
                        <a type="submit" href='#' class="btn btn-primary btn-lg">Salir</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-8" style="padding-right: 0%;">
            <div class="div11" style="display: block;">
                <div id="div1">
                    <table  class="table table-condensed">
                        <tr style="text-align: center" class="success">
                          <td><strong>Id del juego</strong></td>
                          <td><strong>Nombre del juego</strong></td>
                         
                        </tr>
                        <?php foreach($resultadoPreguntas as $row){?>
                        <tr class="active width=3500">
                          <td><strong><?=$row[0]?></strong></td>
                          <td><strong><?=$row[1]?></strong></td>
                          
                        </tr>
                        <?php
                        }}
                        ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-xs-4">
            <div class="row">
                <div class="col-xs-12" style="padding-top: 70px;">
                    <form method="post" onKeypress="if(event.keyCode == 13) event.returnValue = false;">
                        <div class="row">
                            <div class="col-xs-12"> 
                                <div class="col-xs-5 submit">
                                    <h3><label>Ingresar Código</label></h3>
                                </div>
                                <div class="col-xs-4" style="padding-top: 18px;">
                                    <input type="number" class="form-control" name="CodigoPregunta" min="1" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12" style="padding-top: 30px;">                        
                                <div class="col-xs-4 col-xs-offset-1 submit">
                                    <button type="submit" class="btn btn-default btn-md" name="div2" value="1">Modificar</button>
                                </div>
                                <div class="col-xs-4">
                                    <button type="submit" class="btn btn-default btn-md" name="div2" value="2">Notificar</button>
                                </div>
                            </div>
                        </div>                            
                    </form>
                </div>
            </div>
        </div>
    </div>
    <form action="Modificar_PreguntaSQL.php" method="post" enctype="multipart/form-data" onKeypress="if(event.keyCode == 13) event.returnValue = false;">
        <?php
        if(isset($_POST['div2'])&& isset($_POST['CodigoPregunta'])){
            foreach($resultadoPreguntas as $row){
            if($row[0]==$_POST['CodigoPregunta'] && $row[8]==1 && $_POST['div2']==1){
                require("ResBusVF.php");
                $_SESSION["preg"]=$row[8];
                $_SESSION["idPreg"]=$respuesta[0][0];
                $_SESSION["opcion"]=$_POST['div2'];
                if($respuesta[0][5]){
                    $_SESSION["RutPreg"]=$respuesta[0][5];
                }else{
                    $_SESSION["RutPreg"]=$respuesta[0][6];
                }           
        ?>
        <div class="row">
            <div class="col-xs-8 col-xs-offset-2">
                <div style="padding-top: 50px;">
                    <div class="panel panel-default" style="display: block;">
                        <div class="panel-body panel">
                            <h3>ID=<?=$respuesta[0][0]?> Pregunta de Verdadero o Falso</h3>
                            <div class="col-xs-12">
                                <textarea rows="4" cols="50" class="form-control" id="ejemplo_preg" name="texto1"><?=$respuesta[0][1]?></textarea>
                                <script type="text/javascript">
                                    CKEDITOR.replace('texto1');
                                    CKEDITOR.add
                                </script>
                            </div><br /><br /><br /><br /><br />
                            <div class="col-xs-5">
                                <input class="file_url" type="file" name="imagen1" accept=".JPG, .PNG, .JPEG">
                            </div>
                            <div class="col-xs-7">
                                <img class="img_destino" src="<?=$respuesta[0][2]?>" alt="Tu imagen" width="100" height="50">
                            </div>
                            <h3>Respuesta</h3>
                            <ul>
                            <?php
                                if($respuesta[0][3]=='V'){
                            ?>
                                <input type="radio" name="respuesta" value="V" checked="checked">Verdadero<br/>
                                <input type="radio" name="respuesta" value="F">Falso<br/>
                            <?php
                            }else{
                            ?>
                                <input type="radio" name="respuesta" value="V">Verdadero<br/>
                                <input type="radio" name="respuesta" value="F" checked="checked">Falso<br/>
                            <?php
                            }?>
                            </ul><br />
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Ingresar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        }elseif($row[0]==$_POST['CodigoPregunta'] && $row[8]==0 && $_POST['div2']==1){
            require("ResBusVF.php");
            $_SESSION["preg"]=$row[8];
            $_SESSION["idPreg"]=$respuesta[0][0];
            $_SESSION["opcion"]=$_POST['div2'];
            if($respuesta[0][7]){
                $_SESSION["RutPreg"]=$respuesta[0][7];
            }else{
                $_SESSION["RutPreg"]=$respuesta[0][8];
            }
        ?>
        <div class="row">
            <div class="col-xs-8 col-xs-offset-2">
                <div style="padding-top: 50px;">
                    <div class="panel panel-default" style="display: block;">
                        <div class="panel-body panel">
                            <h3>ID=<?=$respuesta[0][0]?> Pregunta de Alternativas</h3>
                            <div class="col-xs-12">
                                <textarea rows="4" cols="50" class="form-control" id="ejemplo_preg" name="texto2"><?=$respuesta[0][1]?></textarea>
                                <script type="text/javascript">
                                    CKEDITOR.replace('texto2');
                                    CKEDITOR.add
                                </script>
                            </div><br /><br /><br /><br /><br />
                            <div class="col-xs-5">
                                <input class="file_url" type="file" name="imagen2" accept=".JPG, .PNG, .JPEG">
                            </div>
                            <div class="col-xs-7">
                                <img class="img_destino" src="<?=$respuesta[0][2]?>" alt="Tu imagen" width="100" height="50">
                            </div>
                            <h3>Respuesta</h3>
                            <ul>
                            <?php
                                if($respuesta[0][5]=='A' && $respuesta[0][6]==1){?>
                                <div class="col-xs-12">
                                    <input type="radio" name="respuesta" value="A" checked="checked">A
                                    <input type="numer" class="form-control" id="ejemplo_preg" name="respuestaA" value="<?=$respuesta[0][3]?>">
                                </div><br/><br/><br/>
                                <div class="col-xs-12">
                                    <input type="radio" name="respuesta" value="B">B
                                    <input type="numer" class="form-control" id="ejemplo_preg" name="respuestaB" value="<?=$respuesta[1][3]?>">
                                </div><br/><br/><br/>
                                <div class="col-xs-12">
                                    <input type="radio" name="respuesta" value="C">C
                                    <input type="numer" class="form-control" id="ejemplo_preg" name="respuestaC" value="<?=$respuesta[2][3]?>">
                                </div><br/><br/><br/>
                                <div class="col-xs-12">
                                    <input type="radio" name="respuesta" value="D">D
                                    <input type="numer" class="form-control" id="ejemplo_preg" name="respuestaD" value="<?=$respuesta[3][3]?>">
                                </div><br/><br/><br/>
                            <?php
                                }elseif($respuesta[1][5]=='B' && $respuesta[1][6]==1){?>
                                <div class="col-xs-12">
                                    <input type="radio" name="respuesta" value="A">A
                                    <input type="numer" class="form-control" id="ejemplo_preg" name="respuestaA" value="<?=$respuesta[0][3]?>">
                                </div><br/><br/><br/>
                                <div class="col-xs-12">
                                    <input type="radio" name="respuesta" value="B" checked="checked">B
                                    <input type="numer" class="form-control" id="ejemplo_preg" name="respuestaB" value="<?=$respuesta[1][3]?>">
                                </div><br/><br/><br/>
                                <div class="col-xs-12">
                                    <input type="radio" name="respuesta" value="C">C
                                    <input type="numer" class="form-control" id="ejemplo_preg" name="respuestaC" value="<?=$respuesta[2][3]?>">
                                </div><br/><br/><br/>
                                <div class="col-xs-12">
                                    <input type="radio" name="respuesta" value="D">D
                                    <input type="numer" class="form-control" id="ejemplo_preg" name="respuestaD" value="<?=$respuesta[3][3]?>">
                                </div><br/><br/><br/>
                            <?php
                                }elseif($respuesta[2][5]=='C' && $respuesta[2][6]==1){?>
                                <div class="col-xs-12">
                                    <input type="radio" name="respuesta" value="A">A
                                    <input type="numer" class="form-control" id="ejemplo_preg" name="respuestaA" value="<?=$respuesta[0][3]?>">
                                </div><br/><br/><br/>
                                <div class="col-xs-12">
                                    <input type="radio" name="respuesta" value="B">B
                                    <input type="numer" class="form-control" id="ejemplo_preg" name="respuestaB" value="<?=$respuesta[1][3]?>">
                                </div><br/><br/><br/>
                                <div class="col-xs-12">
                                    <input type="radio" name="respuesta" value="C" checked="checked">C
                                    <input type="numer" class="form-control" id="ejemplo_preg" name="respuestaC" value="<?=$respuesta[2][3]?>">
                                </div><br/><br/><br/>
                                <div class="col-xs-12">
                                    <input type="radio" name="respuesta" value="D">D
                                    <input type="numer" class="form-control" id="ejemplo_preg" name="respuestaD" value="<?=$respuesta[3][3]?>">
                                </div><br/><br/><br/>
                             <?php
                                }elseif($respuesta[3][5]=='D' && $respuesta[3][6]==1){?>
                                <div class="col-xs-12">
                                    <input type="radio" name="respuesta" value="A">A
                                    <input type="numer" class="form-control" id="ejemplo_preg" name="respuestaA" value="<?=$respuesta[0][3]?>">
                                </div><br/><br/><br/>
                                <div class="col-xs-12">
                                    <input type="radio" name="respuesta" value="B">B
                                    <input type="numer" class="form-control" id="ejemplo_preg" name="respuestaB" value="<?=$respuesta[1][3]?>">
                                </div><br/><br/><br/>
                                <div class="col-xs-12">
                                    <input type="radio" name="respuesta" value="C">C
                                    <input type="numer" class="form-control" id="ejemplo_preg" name="respuestaC" value="<?=$respuesta[2][3]?>">
                                </div><br/><br/><br/>
                                <div class="col-xs-12">
                                    <input type="radio" name="respuesta" value="D" checked="checked">D
                                    <input type="numer" class="form-control" id="ejemplo_preg" name="respuestaD" value="<?=$respuesta[3][3]?>">
                                </div><br/><br/><br/>   
                             <?php }?>
                            </ul><br />
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Ingresar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        }elseif($row[0]==$_POST['CodigoPregunta'] && $_POST['div2']==2){
            $_SESSION["opcion"]=$_POST['div2'];
        ?>
        <div class="row">
            <div class="col-xs-8 col-xs-offset-2">
                <div style="padding-top: 50px;">
                    <div class="panel panel-default" style="display: block;">
                        <div class="panel-body panel">
                            <h3>Notificar al Administrador</h3>
                            <div class="col-xs-12" style="padding-bottom: 30px;">
                                <textarea rows="6" cols="50" class="form-control" id="ejemplo_preg" name="texto3">
                                La pregunta de tipo 
                                <?php if($row[8]==1){?>
                                    <strong>Verdadero o Falso</strong>   
                                <?php }else{?>
                                    <strong>Alternativas</strong>
                                <?php }?>,cuyo codigo es: <strong><?=$row[0]?></strong>,
                                la cual su ejercicio es:<strong><?=$row[1]?></strong>,su respuesta es:<strong><?=$row[2]?></strong>,
                                su tema correspondiente es:<strong><?=$row[4]?></strong> y su subtema es:<strong><?=$row[5]?></strong>;
                                esta debe ser:......................... puesto que:...................................................
                                <p>Saluda atentamente</p><p><strong><?=$nombrecompleto?></strong></p></textarea>
                                <script type="text/javascript">
                                    CKEDITOR.replace('texto3');
                                    CKEDITOR.add
                                </script>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Ingresar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <?php
    }}}
    ?>
    <div class="MenuFinal" style="margin-top: 77px;">
        <h4 class="text-center">Creado por: The Hardcore Engineers</h4>
    </div>
</div>
<script>
    function mostrarImagen(input) {
     if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
       $('.img_destino').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
     }
    }
     
    $(".file_url").change(function(){
     mostrarImagen(this);
    });
</script>
<script src="http://code.jquery.com/jquery.js"></script>
<!-- Javascript core JS -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>
