<?php
$output = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
 require_once 'processNames.php';
 $output = addClearNames();
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content=".width=.container-fluid initial-scale=1">
    <title>Form Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>

  <body class="container">
        <form method="post" action="#">
            <div class="mt-3">
              <button type="submit" name="add" class="btn btn-primary">Add Names</button>
              <button type="submit" name="clear" class="btn btn-primary">Clear Names</button>
            </div>
            <div class="mt-3">
              <label for="names" class="form-label">Enter Name</label>
              <input type="text" class="form-control" id="names" name="names">
            </div>
            <div class="mt-3">
              <label for="namelist" class="form-label">List of Names</label>
              <textarea style="height: 500px;" class="form-control" id="namelist" name="namelist"><?php echo $output ?></textarea>
            </div>
        </form>
    </body>