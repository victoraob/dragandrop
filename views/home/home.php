<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>DragAndDrog</title>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="<?php echo constant('URL')?>public/css/bootstrap.min.css">


	<!--Font awesome-->
	<script defer src="<?php echo constant('URL');?>public/fontawesome/all.js"></script>

	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

	<link rel="stylesheet" href="<?php echo constant('URL')?>public/css/estilo.css"> 


	<script>

		$(function(){

			$('#acordeon').accordion();

			$('#acordeon').find('ul').find('li').draggable({
				helper : 'clone',
				appendTo : 'body'
			});


			$('.drop').droppable({
				activeClass : 'ui-state-default',
				hoverClass : 'ui-state-hover',
				drop : function (event,ui){

    				//alert(ui.draggable.text());
    				$(this).find('h2').remove();
    				$(this).append('<h2>'+ui.draggable.text()+'<h2>');

    			}

    		})

    		$('.cart').find('.row').appendChild().draggable({
                
               });

    		$( "#draggable2" ).draggable({ snap: ".ui-widget-header" });

              

		});  




	</script>

	<style type="text/css">

		#acordeon li:hover{
			cursor: move ;
		}

		.victor {
			background: red;
		}

		.victorin{
			background: blue;
		}

	</style>


</head>
<body >


	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="#">RestOrder</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#"></a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Dropdown
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="#">Action</a>
						<a class="dropdown-item" href="#">Another action</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="#">Something else here</a>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
				</li>
			</ul>
		</div>
	</nav>

	<h1 class="text-center my-5">RestOrder</h1>


	<div class="container-fluid my-5">
		<div class="row justify-content-between">
			<div class="col-lg-1">

			</div>
			<div class="col-lg-2 border border-primary" >
				<div id="contenedor">
					<div id="acordeon">

						<h3><a href="">Mesas</a></h3>
						<div>
							<ul>
								<li>1</li>
								<li>2</li>
								<li>3</li>
							</ul>
						</div>
						<h3><a href="">Sillas</a></h3>
						<div>
							<ul>
								<li>4</li>
								<li>5</li>
								<li>6</li>
							</ul>
						</div>
						<h3><a href="">Zapatos</a></h3>
						<div>
							<ul>
								<li>7</li>
								<li>8</li>
								<li>9</li>
							</ul>
						</div>

					</div>
				</div>
			</div>
			<div class="col-lg-7  border border-primary cart"  style="height: 600px">
				<div class="row">
					<?php for ($i=0; $i < 52; $i++) { ?>
						<div class="col-md-1 drop">
							<h2 style="opacity: .0;">colocar<h2>
						</div>
						
					<?php } ?> 
					
					
					
				</div>	
			</div>
			<div class="col-lg-1">

			</div>
		</div>
	</div>



 





<!-- <form>
    
<div id="draggable" class="ui-widget-content">
  <input type="submit" name="enviar">
</div>

    
</form> -->

















</body>
</html>
