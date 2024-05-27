<?php
require 'components/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="view/assets/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
<body>

    <div class="flex-row">
        <a class="btn" href="index.php?con=dishes&dish=appetizers&op=readcategory"> Voorgerechten </a>
        <a class="btn" href="index.php?con=dishes&dish=main&op=readcategory"> Hoofdgerechten </a>
        <a class="btn" href="index.php?con=dishes&dish=deserts&op=readcategory"> Toetjes </a>
        <a class="btn" href="index.php?con=dishes&dish=drinks&op=readcategory"> Dranken </a>
    </div>

    <div class="flex-column"> 
        <h2> 
            <?php 
            
            if ($dish == "main"){
                $dish_titel = "Hoofdgerechten";
            } elseif ($dish == "appetizers"){
                $dish_titel = "Voorgerechten";
            } elseif ($dish == "deserts"){
                $dish_titel = "Toetjes";
            } else {
                $dish_titel = "Dranken";
            }
            echo $dish_titel; 
            
            ?>  
        </h2>

        <div class="flex-row"> 
            <div>
                <?php echo '<a class="btn" href="index.php?con=dishes&op=create&dish=' . $dish . '">Create</a>' ?>
            </div>
            <div>
                <a class="btn" href="..\examen-training/index.php">Back</a>
            </div>
        </div>
        

        <div class="flex-column">
            <?php echo $html; ?>
        </div>
    </div>



    
</body>
</html>

<?php
require 'components/footer.php';
?>