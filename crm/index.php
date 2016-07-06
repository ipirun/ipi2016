<?php
include_once 'customers.php';

$customers = get_all_customers();
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

            <h1>Liste des contacts</h1>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Company</th>
                        <th>Statut</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if ($customers) {
                            foreach ($customers as $customer) {
                        ?>
                                <tr>
                                    <td>
                                        <?php echo $customer["id"] ?>
                                    </td>
                                    <td>
                                        <?php echo $customer["firstname"] ?>
                                    </td>
                                    <td>
                                        <?php echo $customer["lastname"] ?>
                                    </td>
                                    <td>
                                        <?php echo $customer["company"] ?>
                                    </td>
                                    <td>
                                        <?php echo get_status($customer["signed"]) ?>
                                    </td>
                                    <td>
                                        <a href="edit.php?id=<?php echo $customer['id'] ?>" class="btn btn-primary">
                                            <i class="glyphicon glyphicon-pencil"></i> Edit
                                        </a>
                                        <form method="post" style="display:inline;" action="delete_customer.php">
                                            <input type="hidden" name="id" value="<?php echo $customer['id'] ?>">
                                            <button type="submit" name="button" class="btn btn-danger">
                                                <i class="glyphicon glyphicon-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        else {
                    ?>
                            <tr>Aucun Client</tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>

        </div><!-- /.container -->

    </body>
</html>
