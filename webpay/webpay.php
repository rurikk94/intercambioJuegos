<?php 

$saldo=$_POST["nombre_categoria"];
include("num2letras.php"); 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="pragma" content="no-cache">
        <meta http-equiv="cache-control" content="no-cache, must-revalidate">
        <meta name="expires" content="Wed, 01 Jan 1997 00:00:00 GMT">
        <title>Pago Seguro WebPay</title>
        <link href="Pago%20Seguro%20WebPay_archivos/styleCssView.css" rel="stylesheet" type="text/css">
        <script src="Pago%20Seguro%20WebPay_archivos/jquery.js" type="text/javascript"></script>
        <script src="Pago%20Seguro%20WebPay_archivos/funciones.js" type="text/javascript"></script>
		<style>
			body {
				background-image: url("http://i.imgur.com/ooQufkW.gif");
				background-repeat: repeat;
			}
			</style>
    </head>
    <body>
        <div id="wpcontenedor">
            <div id="wpcabecera">
                




    <div id="tiendalogo">  
        
        
    </div>

    <div id="wplogo">
        
            <img src="Pago%20Seguro%20WebPay_archivos/logowp2.gif" alt="logowp2">
        
    </div>


            </div>
            <div id="wpprincipal" style="border-width: medium 1px 1px; border-style: none solid solid; border-color: currentcolor rgb(212, 212, 212) rgb(212, 212, 212); -moz-border-top-colors: none; -moz-border-right-colors: none; -moz-border-bottom-colors: none; -moz-border-left-colors: none; border-image: none;">
                








<form id="timeOutForm" method="post">
    <input name="token" value="e6320f12934f9f1385aadd723fcb747569f2da37f41c73d34b6474749e49096a" type="hidden">
</form>
<script type="text/javascript">
    
    
    setTimeout('wpTimeOut()',600000);
      
    function wpTimeOut(){
        
        $("#timeOutForm").submit();
        
    }
</script>


<form id="webpayForm" name="webpayForm"  method="POST" onsubmit="return false;">

    
        
        
            <script type="text/javascript">
                cambioEstilo('#EFEFF0','#D4D4D4','#F7F7F7');
            </script>
        
    
     
    <div id="wpcardtype">
        <div class="grupoPestanas">
            <div id="a" class="pestana_u">
                <b class="p1u"></b><b class="p2u" style="background: rgb(239, 239, 240) none repeat scroll 0% 0%;"></b><b class="p3u" style="background: rgb(239, 239, 240) none repeat scroll 0% 0%;"></b><b class="p4u" style="background: rgb(239, 239, 240) none repeat scroll 0% 0%;"></b>
                <div class="punselect" style="height: 45px; background: rgb(239, 239, 240) none repeat scroll 0% 0%;">
                    
                        
                            













Tarjeta de Crédito
<input name="TBK_TIPO_TARJETA" id="TBK_TIPO_TARJETA" value="CREDIT_CARD" type="radio">
<br>

                            
                                <img src="Pago%20Seguro%20WebPay_archivos/Visa.gif" alt="Visa">&nbsp;
                            
                                <img src="Pago%20Seguro%20WebPay_archivos/MasterCard.gif" alt="MasterCard">&nbsp;
                            
                                <img src="Pago%20Seguro%20WebPay_archivos/Magna.gif" alt="Magna">&nbsp;
                            
                                <img src="Pago%20Seguro%20WebPay_archivos/AMEX.gif" alt="AMEX">&nbsp;
                            
                                <img src="Pago%20Seguro%20WebPay_archivos/Diners.gif" alt="Diners">&nbsp;
                            
                        
                        
                    

                </div>
                <b class="pbu" style="background: rgb(239, 239, 240) none repeat scroll 0% 0%;"></b>
            </div>
            <div class="bordeInferior" style="width:10px;"></div>
            <div class="pestana_s">
                <b class="p1s"></b><b class="p2s" style="background: rgb(239, 239, 240) none repeat scroll 0% 0%;"></b><b class="p3s" style="background: rgb(239, 239, 240) none repeat scroll 0% 0%;"></b><b class="p4s" style="background: rgb(239, 239, 240) none repeat scroll 0% 0%;"></b>
                <div class="pselect" style="height: 45px; background: rgb(239, 239, 240) none repeat scroll 0% 0%;">
                    
                        
                            
                                
                                    













Redcompra
<input name="TBK_TIPO_TARJETA" id="TBK_TIPO_TARJETA" value="DEBIT_CARD" type="radio">
<br>
                                    <img src="Pago%20Seguro%20WebPay_archivos/rcompra.gif" alt="redcompra">&nbsp;
                                
                                
                            
                        
                        
                    

                </div>
                <b class="pbs" style="background: rgb(239, 239, 240) none repeat scroll 0% 0%;"></b>
            </div>
        </div>
    </div>
   <div id="wpcard">
        






<div id="montotrx" align="center">
<table class="EstiloMonto">
        <tbody><tr>
            <td align="left"><strong><span class="Estilo666">
                        Total a Pagar 








$ <?=$saldo?></span></strong> </td>
        </tr>
        <tr>
            <td align="left"> <span class="Estilo6"><?echo num2letras($saldo);?>
                    
                        
                            pesos chilenos
                        
                        
                    
            </span></td>
        </tr>
    </tbody></table>
</div>





    </div>
    <div id="error"></div>
    <div id="wpbotones">
        <table class="wptablacentrada" width="470" border="0">
            <tbody><tr>
                <td align="left">
                    <div id="wpbtn1">
                         <a href="..\recargarSaldo.php"><input class="btnanular" name="button" id="button3"  value="" style="background:url(Pago%20Seguro%20WebPay_archivos/btnanular.gif)" type="button"></a>

                    </div>
                </td>
                <td align="right">
                    <div id="wpbtn2">
                        <a href="..\agregarSaldoSQL.php?s='<?=$saldo?>'"><input class="btnpagar" name="button" id="button"  value="" style="background:url(Pago%20Seguro%20WebPay_archivos/btnpagar.gif)" type="button"></a>
                    </div>
                </td>
            </tr>
        </tbody></table>
    </div>
    <input name="TBK_TOKEN" value="e6320f12934f9f1385aadd723fcb747569f2da37f41c73d34b6474749e49096a" type="hidden">
    <input name="currentCommerceId" id="currentCommerceId" value="default" type="hidden">

</form>

            </div>
            <div id="wpfooter">


<div id="wpfooter">    
    <div id="wpimage" align="right">
        
            <img src="Pago%20Seguro%20WebPay_archivos/Visa.gif" alt="Visa">&nbsp;
        
            <img src="Pago%20Seguro%20WebPay_archivos/MasterCard.gif" alt="MasterCard">&nbsp;
        
            <img src="Pago%20Seguro%20WebPay_archivos/Magna.gif" alt="Magna">&nbsp;
        
            <img src="Pago%20Seguro%20WebPay_archivos/AMEX.gif" alt="AMEX">&nbsp;
        
            <img src="Pago%20Seguro%20WebPay_archivos/Diners.gif" alt="Diners">&nbsp;
        
        
            <img src="Pago%20Seguro%20WebPay_archivos/rcompra.gif" alt="redcompra">&nbsp;
        
        <br>
        <img src="Pago%20Seguro%20WebPay_archivos/lock.gif" alt="logoCandado">
        <span class="Info">
            Esta transacción se está realizando sobre un sistema seguro.</span>
        
        <br>
        <table align="right">
            <tbody><tr>
                
                    <td>
                        <img src="Pago%20Seguro%20WebPay_archivos/verifiedVisa.gif" alt="Visa">
                    </td>
                
                
                    <td>
                        <img src="Pago%20Seguro%20WebPay_archivos/secureMasterCard.gif" alt="Master">
                    </td>
                
            </tr>
        </tbody></table>
    </div>
</div>
            </div>
        </div>
    

</body></html>