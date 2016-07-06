<?php
include 'customers.php';

if(isset($_GET["id"])) {
    $customer = get_one_customer($_GET["id"]);
?>
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

        <div class="container">
            <div class="col-md-8 col-offset-4 col-xs-12">
                <h1><?php echo $customer["firstname"] . " " . $customer["lastname"]; ?></h1>
                <form method="post" action="edit_customer.php" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="company">Société : </label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="company" id="company" value="<?php echo $customer["company"]; ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="firstname">Prénom : </label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="firstname" id="firstname" value="<?php echo $customer["firstname"]; ?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="lastname">Nom : </label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="lastname" id="lastname" value="<?php echo $customer["lastname"]; ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="signed">Statut : </label>
                        <div class="col-sm-10">
                            <select name="signed" class="form-control">
                     			<option value="assigned" <?php echo $customer["signed"] == "assigned" ? "selected" : ''; ?>>Attribué à un commercial</option>
                     			<option value="meeting" <?php echo $customer["signed"] == "meeting" ? "selected" : ''; ?>>RDV pris</option>
                     			<option value="done" <?php echo $customer["signed"] == "done" ? "selected" : ''; ?>>Contrat signé</option>
                     		</select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="hidden" name="id" value="<?php echo $customer['id'] ?>">
                            <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i> Enregistrer Modifications</button>
                        </div>
                    </div>
                 </form>
             </div>
         </div>
     </body>
</html>

<?php
}
else {
    echo "Nothing here....";
}

 ?>
