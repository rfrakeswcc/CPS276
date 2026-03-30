<?php
    if($_SERVER["REQUEST_METHOD"] == "POST")
        {
        require_once 'fileUploadProc.php';
        require_once 'php/listFilesProc.php';
        }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content=".width=.container-fluid initial-scale=1">
    <title>File Upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
    <body>
        <div class="container mt-5">
            <h1 class="mb-3">File Upload</h1>
            <p>
                <a href="listFiles.php">Show File List</a>
            </p>
            <?php echo $output; ?>
            <form method="POST" enctype="multipart/form-data" class="mt-4">
                <div class="mb-3">
                    <label class="form-label">File Name</label>
                    <input type="text" name="file_name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <input type="file" name="pdf_file" class="form-control" accept="application/pdf" required>
                </div>
                <button type="submit" class="btn btn-primary">Upload File</button>
            </form>
        </div>
    </body>