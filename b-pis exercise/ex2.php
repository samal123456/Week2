<?php

declare(strict_types=1);

require_once __DIR__ . '/data.php';
require_once __DIR__ . '/helpers.php';


// Step 1: Count pending requests

$counts = [];

foreach ($requests as $r) {

    if (
        $r['status'] === 'Submitted' ||
        $r['status'] === 'Under review'
    ) {

        $dzongkhag = strtolower(trim($r['dzongkhag']));

        $dzongkhag = ucfirst($dzongkhag);

        if (!isset($counts[$dzongkhag])) {
            $counts[$dzongkhag] = 0;
        }

        $counts[$dzongkhag]++;
    }
}


// Step 2: Find highest count

$highest = 0;

foreach ($counts as $dzongkhag => $count) {

    if ($count > $highest) {
        $highest = $count;
    }
}


// Step 3: Print every winner

foreach ($counts as $dzongkhag => $count) {

    if ($count === $highest) {

        echo "Busiest: $dzongkhag ($count pending)<br>";
    }
}