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
        <?php               
            if ($dish == "main"){
                $dish_titel = "Hoofdgerecht";
            } elseif ($dish == "appetizers"){
                $dish_titel = "Voorgerecht";
            } elseif ($dish == "deserts"){
                $dish_titel = "Toetje";
            } else {
                $dish_titel = "Drank";
            }
            echo $dish_titel; 
        ?>  
        verwijderd
    </h1>

    <div>
        <?php echo '<a class="btn" href="index.php?con=dishes&dish=' . $dish . '">Back</a>' ?>
    </div>

</body>
</html>

<?php
require 'view/components/footer.php';
?>