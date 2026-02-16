
<?php
        
        $numbers = [];
        $evenNumbers = '';
        for ( $i = 0; $i < 50; $i++ )
            {
                $numbers[$i] = ( $i + 1 );
            }
        foreach ( $numbers as $number )
            {
            if ( ( $number % 2) == 0 )
                {
                if ( $number < 50 )
                    {
                    $evenNumbers = $evenNumbers . strval( $number ) . ' - ';
                    }
                else
                    {
                    $evenNumbers = $evenNumbers . strval( $number );
                    }
                }
            }
    $form = <<<END
        <form>
            <div class="row">
                <label for="Email address" class="form-label">Email address</label>
                <input type="email" class="form-control" id="Email address" placeholder="name@example.com">
            </div>
        </form>
        END;
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content=".width=.container-fluid initial-scale=1">
    <title>Form Project 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
<body class="container">
    <?php
        echo $evenNumbers;
        echo $form;
       /* echo createTable(8, 6); */
    ?> 
</body>
