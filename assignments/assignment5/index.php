<?php

$message = "";
$link = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    require_once 'classes/Directories.php';

    $foldername = $_POST["foldername"];
    $filecontent = $_POST["filecontent"];

    $dir = new Directories($foldername, $filecontent);

    $result = $dir->createDirectory();

    $message = $result["message"];

    if($result["success"]){
        $link = $result["path"];
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content=".width=.container-fluid initial-scale=1">
    <title>File and Directory Assignment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>

  <body class="container">
    <header>
      <h1>Testing File and Directory Assignment</h1>
      <p>Enter a folder name and the contents of a file. Folder names should contain alpha numeric characters only.</p>
    </header>
    <?php
      if(!empty($message))
        {
        echo "<p>$message</p>";
        }
      if(!empty($link))
        {
        echo "<p><a href='$link'>Path where the file is located</a></p>";
        }
    ?>
    <form method="post" action="#">
      <div class="mt-3">
        <label for="foldername" class="form-label">Folder Name</label>
        <input type="text" class="form-control" id="foldername" name="foldername">
      </div>
      <div class="mt-3">
        <label for="filecontent" class="form-label">File Content</label>
        <textarea style="height: 150px;" class="form-control" id="filecontent" name="filecontent"></textarea>
      </div>
      <div class="mt-3">
        <button type="submit" name="Submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </body>