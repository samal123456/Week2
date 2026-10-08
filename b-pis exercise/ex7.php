<?php

declare(strict_types=1);

require_once __DIR__ . '/data.php';
require_once __DIR__ . '/helpers.php';


$cidGroups = [];


// Group request IDs by CID

foreach ($requests as $r) {

    $cid = $r['cid'];

    if (!isset($cidGroups[$cid])) {
        $cidGroups[$cid] = [];
    }

    $cidGroups[$cid][] = $r['id'];
}


// Print duplicate CIDs

foreach ($cidGroups as $cid => $ids) {

    if (count($ids) > 1) {

        echo "Duplicate $cid: requests "
            . implode(', ', $ids)
            . "<br>";
    }
}


echo "<br>";


// Print invalid CIDs

foreach ($requests as $r) {

    if (!is_valid_cid($r['cid'])) {

        echo "Invalid CID in request "
            . $r['id']
            . ": "
            . $r['cid']
            . "<br>";
    }
}