<?php
require 'components/header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<div class="grid-container">
        <?php
        if (isset($msg)) {
            echo $msg;
        }
        ?>
        <div class="flex">
            <div class="flex-column">
                <?php echo $html; ?>
            </div>


            <div class="flex-column-left">
                <h1>Besteld</h1>
                <form id="orderForm" action="index.php?con=orders&op=create" method="post">
                    <button type="submit">Bestellen</button>
                    <input type="hidden" name="total" value="0">
                </form>
                <hr>
                <p class="total">€0</p>
            </div>
        </div>

    </div>
    <script src="view/assets/index.js"></script>

</body>

</html>

<?php
require 'components/footer.php';
?>