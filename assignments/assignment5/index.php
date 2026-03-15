<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content=".width=.container-fluid initial-scale=1">
    <title>File and Directory Assignment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>

  <body class="container">
    Enter a folder name and the contents of a file. Folder names should contain alpha numeric characters only.
        <form method="post" action="#">
            <div class="mt-3">
              <label for="foldername" class="form-label">Folder Name</label>
              <input type="text" class="form-control" id="foldername" name="foldername">
            </div>
            <div class="mt-3">
              <label for="filecontent" class="form-label">File Content</label>
              <textarea style="height: 500px;" class="form-control" id="filecontent" name="filecontent"><?php echo $output ?></textarea>
            </div>
            <div class="mt-3">
              <button type="submit" name="submit" class="btn btn-primary">Add Names</button>
            </div>
        </form>
    </body>