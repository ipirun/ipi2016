<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Crm IPI</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <!-- Optional theme -->
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <!-- Latest compiled and minified JavaScript -->
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body style="padding-top:70px;">
        <nav class="navbar navbar-inverse navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="index.php">CRM Ipi</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
              <ul class="nav navbar-nav">
                <li><a href="new.php">Nouveau Contact</a></li>
              </ul>
            </div><!--/.nav-collapse -->
          </div>
        </nav>


<!--<div class="container">
<form method="post" action="add_customer.php">
   <fieldset>
       <legend>Vos coordonnées</legend> 
       <p>
       <label for="company">Nom de la société : </label>
       <input type="text" name="company" id="company" />
       </p>
       <p>
       <label for="nom">Votre Nom : </label>
       <input type="text" name="firstname" id="firstname" />
	   </p>
	   <p>
       <label for="prenom">Votre Prénom : </label>
       <input type="text" name="lastname" id="lastname" />
       </p>
       <p>
       <label for="statut">Statut : </label><select name="signed" size="1">
			< value="assigned">Attribué à un commercial</option>
			<option value="meeting">RDV pris</option>
			<option value="done">Contrat signé</option>
		</select>
       </p>
       <p>
        <button type="submit" class="btn btn-primary" value="valider">Valider</button>
       </p>
   </fieldset>
 </form>
</div>
 </html> <!-- Titre du fieldset -->





<div class="container">
<form class="form-horizontal"  method="post" action="add_customer.php">
  <div class="form-group">
    <legend>Vos coordonnées</legend>
    <label for="company" class="col-sm-2 control-label">Nom de la société : </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="company" name="company">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">Votre nom : </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="firstname" id="firstname">
    </div>
    </div>
    <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">Votre prénom : </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="lastname" name="lastname">
    </div>
    </div>

    <!-- Single button -->
<div class="form-group">
<label class="col-sm-2 control-label" for="signed">Statut : </label>
<div class="col-sm-10">
<select name="signed" class="form-control">
    <option value="assigned">Attribué à un commercial</option>
    <option value="meeting">RDV pris</option>
    <option value="done">Contrat signé</option> 
</select>
</div>
</div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
       <button type="submit" class="btn btn-primary" value="valider">Valider</button>
    </div>
  </div>

</form>
</div>
</html>