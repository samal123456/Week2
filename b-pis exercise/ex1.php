<?php

declare(strict_types=1);

require_once __DIR__ . '/data.php';
require_once __DIR__ . '/helpers.php';


// Snippet A

$x = 0;

$label = $x ?: 'none';

$size = $x ?? 'none';

echo "A: $label | $size";

echo "<br><br>";


// Snippet B

$total = 0;

for ($i = 1; $i <= 10; $i++) {

    if ($i % 3 === 0) {
        continue;
    }

    if ($i > 7) {
        break;
    }

    $total += $i;
}

echo "B: $total";

echo "<br><br>";


// Snippet C

$m = [
    'b' => 2,
    'a' => 1,
    'c' => 3
];

$out = '';

foreach ($m as $k => $v) {

    $up = $v > 1;

    $out .= $up ? strtoupper($k) : $k;
}

echo "C: $out";

echo "<br><br>";


// Snippet D

$n = strlen(trim(' Paro '));

echo "D: " . $n . substr('Paro', -2);