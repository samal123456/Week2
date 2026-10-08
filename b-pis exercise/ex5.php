<?php

declare(strict_types=1);

require_once __DIR__ . '/data.php';
require_once __DIR__ . '/helpers.php';


$testMoves = [
    ['Submitted', 'Under review'],
    ['Submitted', 'Approved'],
    ['Under review', 'Rejected'],
    ['Approved', 'Submitted'],
    ['Rejected', 'Submitted'],
    ['Closed', 'Submitted']
];


foreach ($testMoves as $move) {

    $from = $move[0];
    $to = $move[1];

    $result = can_move($from, $to);

    echo "$from → $to: ";

    echo $result ? "Allowed" : "Blocked";

    echo "<br>";
}


echo "<br>";


// Extension

echo "Role tests:<br>";

echo "Officer: ";

echo can_move_as(
    'officer',
    'Under review',
    'Approved'
) ? "true" : "false";

echo "<br>";

echo "Approver: ";

echo can_move_as(
    'approver',
    'Under review',
    'Approved'
) ? "true" : "false";

echo "<br>";

echo "Requester: ";

echo can_move_as(
    'requester',
    'Rejected',
    'Submitted'
) ? "true" : "false";