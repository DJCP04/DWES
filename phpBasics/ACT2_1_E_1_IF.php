<!DOCTYPE html>
<html lang="en">

<body>
    <p>Ejemplo de IF</p>
    <?php
    $a = 10;
    $b = $a * 2;

    if ($a > $b) {
        echo "a es mas grande que b";
    } elseif ($a == $b) {
        echo "a es igual que b";
    } else {
        echo "a es menor que b";
    }
    ?>
</body>

</html>