<?php
require 'view/components/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h1>   
        Bestelling verwijderd
    </h1>

    <div>
        <?php echo '<a class="btn" href="index.php?con=orders&op=readall">Back</a>' ?>
    </div>

</body>
</html>

<?php
require 'view/components/footer.php';
?>