<!DOCTYPE html>
<html lang="en">
<head>
  <title>Creador de Thumb de imagenes</title>
  <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
  <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
  <script src="crop/jquery.min.js"></script>
  <script src="crop/jquery.Jcrop.js"></script>
  <link rel="stylesheet" href="crop/demos.css" type="text/css" />
  <link rel="stylesheet" href="crop/jquery.Jcrop.css" type="text/css" />

<script type="text/javascript">

  $(function(){

    $('#cropbox').Jcrop({
	  //minSize:[226,97],
      //aspectRatio: 300/230,
      onSelect: updateCoords
    });

  });

  function updateCoords(c)
  {
    $('#x').val(c.x);
    $('#y').val(c.y);
    $('#w').val(c.w);
    $('#h').val(c.h);
  };

  function checkCoords()
  {
    if (parseInt($('#w').val())) return true;
    alert('Please select a crop region then press submit.');
    return false;
  };

</script>
<style type="text/css">
body{overflow:hidden;}
.wrapper{margin:0 auto;width:760px;}
#target {
    background-color: #ccc;
    width: 500px;
    height: 330px;
    font-size: 24px;
    display: block;
}
.msg-success{margin:20px auto;width:740px;padding:10px 20px;color:#fff!important;background:#093!important;font-size:25px!important;}
.btn {
margin-top:-10px;
display: inline-block;
padding: 4px 12px;
margin-bottom: 0px;
font-size: 14px;
line-height: 20px;
color: #333333;
text-align: center;
text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75);
vertical-align: middle;
cursor: pointer;
background-color: #f5f5f5;
background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#ffffff), to(#e6e6e6));
background-image: -webkit-linear-gradient(top, #ffffff, #e6e6e6);
background-image: -o-linear-gradient(top, #ffffff, #e6e6e6);
background-image: linear-gradient(to bottom, #ffffff, #e6e6e6);
background-image: -moz-linear-gradient(top, #ffffff, #e6e6e6);
background-repeat: repeat-x;
border: 1px solid #bbbbbb;
border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
border-color: #e6e6e6 #e6e6e6 #bfbfbf;
border-bottom-color: #a2a2a2;
-webkit-border-radius: 4px;
-moz-border-radius: 4px;
border-radius: 4px;
filter: progid:dximagetransform.microsoft.gradient(startColorstr='#ffffffff', endColorstr='#ffe6e6e6', GradientType=0);
filter: progid:dximagetransform.microsoft.gradient(enabled=false);
-webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2),0 1px 2px rgba(0, 0, 0, 0.05);
-moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2),0 1px 2px rgba(0, 0, 0, 0.05);
box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2),0 1px 2px rgba(0, 0, 0, 0.05);
}
.btn-warning {
color: #ffffff;
text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
background-color: #faa732;
background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#fbb450), to(#f89406));
background-image: -webkit-linear-gradient(top, #fbb450, #f89406);
background-image: -o-linear-gradient(top, #fbb450, #f89406);
background-image: linear-gradient(to bottom, #fbb450, #f89406);
background-image: -moz-linear-gradient(top, #fbb450, #f89406);
background-repeat: repeat-x;
border-color: #f89406 #f89406 #ad6704;
border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
filter: progid:dximagetransform.microsoft.gradient(startColorstr='#fffbb450', endColorstr='#fff89406', GradientType=0);
filter: progid:dximagetransform.microsoft.gradient(enabled=false);
}


</style>

</head>
	<body>
		<div class="wrapper">
        <?php 
			if(isset($_GET['msg'])){
				$msg=$_GET['msg'];
				switch($msg){
					case 'success':
						$msg='<a href="img/thumb/'.$_GET['img'].'" target="_blank"><div class="btn msg-success">Se creo el thumb correctamente '.$_GET['img'].'</div></a>';
					break;					
					case 'error':
						$msg='Error al crear thumb';
					break;
				}
				echo $msg;
			}
		?>
		<!-- This is the image we're attaching Jcrop to -->
		<img src="img/the_last_us.png" id="cropbox" />
		
		<!-- This is the form that our event handler fills -->
		<form action="action.php" method="post" onsubmit="return checkCoords();">
        	<input type="hidden" name="imagencrop" value="the_last_us.png"/><br/>
			Cordenadas X: <input type="text" id="x" name="x" />
			Cordenadas Y: <input type="text" id="y" name="y" /><br/>
			Anchon crop: <input type="text" id="w" name="w" />
			Alto crop: <input type="text" id="h" name="h" /><br/><br/>
			<input type="submit" value="Recortar Imagen" class="btn btn-warning icon-ban-circle icon-white" />
		</form>
		</div>
	
	</body>

</html>
