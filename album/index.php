<?php
/**
* Créer un galerie a partir d'un dossier
*/
function recuperation_image($folder_to_follow){

	$files = scandir($folder_to_follow);
	unset($files[0]);
	unset($files[1]);

	return $files;
}
//TODO Creer la routine de pagination
function pagination($no_file){

}

function afficher_galerie($no_file){
	$folder_to_scan = "images";
	$files = recuperation_image($folder_to_scan);
	$max_file = count($files)+2;
	$limit_img = $no_file+9;

	//foreach ($files as $key => $file) {
	 //Pour chaque image
	//  $tabimg = 2;
	$tabimg = $no_file;
	 do {
		 echo "<div class='row'>";
		 //echo "f: $key : $file <br/>";
		 for ($i=0 ; $i<3 ; $i++){
			 if($tabimg < $max_file){
				 echo "<div class='col-xs-3'>";
				 echo "<img src='".$folder_to_scan."/".$files[$tabimg]."' class='thumbnail img-responsive center-block' alt='".$files[$tabimg]."'/>";
				 echo "</div>";
				 $tabimg++;
			 }else {
			 	# code...
				echo "</div>";
				return;
			 }
		 }
		 //echo '<hr/>';
		 echo "</div>";
		// } while ($tabimg < (count($files)+2));
	} while ($tabimg < $limit_img);
}

// $folder_to_scan = "images";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>ma joli page woahoooooooo</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
		<style>
		 	.col-xs-3{
				float:none;
				display:inline-block;
				vertical-align:middle;
				text-align: center;
			}

			.starter-template .col-xs-3 img {
				max-height:240px;
				width:100%;
			}

		</style>
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
			 $pagination = $_GET['pagination'];
		 }else{
			 $pagination = 2;
		 }
		 afficher_galerie($pagination);

		 if ($pagination > 2) { ?>
			<a href="index.php?pagination=<?php echo $pagination-9; ?>">Page precedente</a>
			<?php
		 }
		 if($pagination < 20){
		 ?>
		 <a href="index.php?pagination=<?php echo $pagination+9; ?>">Page suivante</a>
		 <?php
		 }
	  //  $files = recuperation_image($folder_to_scan);
	  //  //foreach ($files as $key => $file) {
	  //  	//Pour chaque image
		// 	$tabimg = 2;
		// 	do {
		// 	echo "<div class='row'>";
	  //  	//echo "f: $key : $file <br/>";
		// 	for ($i=0 ; $i<3 ; $i++){
		// 		echo "<div class='col-md-4'>";
	  //  		echo "<img src='".$folder_to_scan."/".$files[$tabimg]."' class='thumbnail img-responsive' alt='".$files[$tabimg]."'/>";
		// 		echo "</div>";
		// 		$tabimg++;
		// 	}
		// 	//echo '<hr/>';
		// 	echo "</div>";
		// } while ($tabimg < (count($files)+2));
	   //}
	   ?>
	 </div>

	 <div id="modal-preview" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        <p>One fine body&hellip;</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
   </div><!-- /.container -->



   <!-- Bootstrap core JavaScript
   ================================================== -->
   <!-- Placed at the end of the document so the pages load faster -->
	 	<script src="http://code.jquery.com/jquery-2.2.4.min.js" charset="utf-8"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" charset="utf-8"></script>
	</body>
</html>
