<?php

function make_reference(
    int $id,
    string $dzongkhag,
    string $submitted
): string {

    $dzongkhag = trim($dzongkhag);

    $prefix = strtoupper(substr($dzongkhag, 0, 3));

    $year = date('Y', strtotime($submitted));

    return sprintf('%s-%s-%04d', $prefix, $year, $id);
}


function wait_band(int $days): string
{
    if ($days < 0) {
        return 'Check date';
    } elseif ($days <= 7) {
        return 'On time';
    } elseif ($days <= 14) {
        return 'Follow up';
    } else {
        return 'Overdue';
    }
}


function is_valid_cid(string $cid): bool
{
    return preg_match('/^\d{11}$/', $cid) === 1;
}


function can_move(string $from, string $to): bool
{
    $rules = [
        'Submitted' => ['Under review'],
        'Under review' => ['Approved', 'Rejected'],
        'Rejected' => ['Submitted'],
        'Approved' => []
    ];

    $allowed = $rules[$from] ?? [];

    return in_array($to, $allowed, true);
}


function can_move_as(
    string $role,
    string $from,
    string $to
): bool {

    if (!can_move($from, $to)) {
        return false;
    }

    $roleRules = [
        'officer' => [
            'Under review'
        ],

        'approver' => [
            'Approved',
            'Rejected'
        ],

        'requester' => [
            'Submitted'
        ]
    ];

    $allowed = $roleRules[$role] ?? [];

    return in_array($to, $allowed, true);
}