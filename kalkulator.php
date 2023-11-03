<?php
if(isset($_POST['num1']) && isset($_POST['num2']) && isset($_POST['operation'])) {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $operation = $_POST['operation'];
    $result = 0;

    switch($operation) {
        case 'add':
            $result = $num1 + $num2;
            echo "<p>Hasil penambahan: $result</p>";
            break;
        case 'subtract':
            $result = $num1 - $num2;
            echo "<p>Hasil pengurangan: $result</p>";
            break;
        case 'multiply':
            $result = $num1 * $num2;
            echo "<p>Hasil perkalian: $result</p>";
            break;
        case 'divide':
            if ($num2 != 0) {
                $result = $num1 / $num2;
                echo "<p>Hasil pembagian: $result</p>";
            } else {
                echo "<p>Angka kedua tidak bisa nol untuk pembagian!</p>";
            }
            break;
        default:
            echo "Operasi tidak dikenali";
    }
}
