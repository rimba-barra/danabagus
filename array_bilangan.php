<?php
    function isPrime($num) {
        if ($num < 2) return false;
        for ($i = 2; $i <= sqrt($num); $i++) {
            if ($num % $i == 0) return false;
        }
        return true;
    }

    $numbers = range(1, 100);
    $result = [];

    for ($i = 100; $i >= 1; $i--) {
        if (isPrime($i)) continue;

        if ($i % 3 == 0 && $i % 5 == 0) {
            $result[] = "FooBar";
        } elseif ($i % 3 == 0) {
            $result[] = "Foo";
        } elseif ($i % 5 == 0) {
            $result[] = "Bar";
        } else {
            $result[] = $i;
        }
    }

    echo 'Nama : Erwin Santoso';
    echo '<br/><br/><br/>';
    echo implode(" ", $result);
?>
