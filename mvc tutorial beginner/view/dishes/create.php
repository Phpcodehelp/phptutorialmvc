<?php
require 'view/components/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="view/assets/style.css">
</head>
<body>
    <div class="">
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
            toevoegen
        </h1>
        <?php echo '<form action="index.php?con=dishes&op=create&dish=' . $dish . '" method="POST">' ?>
            <table>
                <tr>
                    <td> Naam: </td>
                    <td><input type="text" name="name"></td>
                </tr>
                <tr>
                    <td> Kost: </td>
                    <td><input type="text" name="cost"></td>
                </tr>
                <tr>
                    <td>
                        <select id="type" name="type">
                            <option value="appetizers">Voorgerecht</option>
                            <option value="main">Hoofdgerecht</option>
                            <option value="deserts">Toetje</option>
                            <option value="drinks">Dranken</option>
                        </select>
                    </td>
                </tr>
            </table>
            <input type="submit" name="create" value="Toevoegen"> 
        </form>

        <div class="flex-row">
            <?php echo '<a class="btn" href="index.php?con=dishes&dish=' . $dish . '">Back</a>' ?>
        </div>
    </div>  
</body>
</html>

<?php
require 'view/components/footer.php';
?>