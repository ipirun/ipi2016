<?php
include 'gallery.php';
//Recuperation du traitement de la gallerie
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>ma joli page woahoooooooo</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
		<link rel="stylesheet" href="gallery.css" media="screen" title="no title" charset="utf-8">
	</head>
	<body>
		<nav class="navbar navbar-inverse navbar-fixed-top">
	 <div class="container">
	   <div class="navbar-header">
		 <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
		   <span class="sr-only">Toggle navigation</span>
		   <span class="icon-bar"></span>
		   <span class="icon-bar"></span>
		   <span class="icon-bar"></span>
		 </button>
		 <a class="navbar-brand" href="#">Project name</a>
	   </div>
	   <div id="navbar" class="collapse navbar-collapse">
		 <ul class="nav navbar-nav">
		   <li class="active"><a href="#">Home</a></li>
		   <li><a href="#about">About</a></li>
		   <li><a href="#contact">Contact</a></li>
		 </ul>
	   </div><!--/.nav-collapse -->
	 </div>
   </nav>

   <div class="container">

	 <div class="starter-template">
	   <h1>Bootstrap starter template</h1>
	   <p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p>
		 <?php //recuperation des images

		 if(isset($_GET['pagination'])){
			 //On recupere en GET la pagination de l'image
			 $pagination = $_GET['pagination'];
		 }else{
			 //On initialise la pagination a 2
			 $pagination = 2;
		 }

		 //**************
		 //	GALLERIE
		 //**************
		 afficher_galerie($pagination);
		 //Traitement de l'affichage de la galerie

		 //**************
		 //	PAGINATION
		 //**************
		 if ($pagination > 2) {
			 //Page precedente
		?>
			<a href="index.php?pagination=<?php echo $pagination-9; ?>">Page precedente</a>
			<?php
		 }
		 if($pagination < 20){
			 //Page suivante
		 ?>
		 <a href="index.php?pagination=<?php echo $pagination+9; ?>">Page suivante</a>
		 <?php } ?>

	 </div><!-- /.starter-template -->
   </div><!-- /.container -->

	 <div id="myModal" class="modal fade" tabindex="-1" role="dialog">
		 <div class="modal-dialog modal-lg">
			 <div class="modal-content">
				 <div class="modal-header">
					 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					 <h4 class="modal-title">Modal title</h4>
				 </div>
				 <div class="modal-body">
					 <img src="" class="img-responsive"/>
				 </div>
				 <div class="modal-footer">
					 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				 </div>
			 </div><!-- /.modal-content -->
		 </div><!-- /.modal-dialog -->
	 </div><!-- /.modal -->



   <!-- Bootstrap core JavaScript
   ================================================== -->
   <!-- Placed at the end of the document so the pages load faster -->
	 	<script src="http://code.jquery.com/jquery-2.2.4.min.js" charset="utf-8"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" charset="utf-8"></script>
		<script src="gallery.js" charset="utf-8"></script>

	</body>
</html>
