<?php

// Before: impossible (only arrays with numeric keys were allowed)
// After:
$arrayA = ['a' => 1];
$arrayB = ['b' => 2];
$arrayUnpackingA = [...$arrayA, ...$arrayB, 'c' => 3];
$arrayUnpackingB = ['a' => 0, ...$arrayA, ...$arrayB]; // Highlighting the way to resolve the conflict of identical keys

print_r($arrayUnpackingA);
print_r($arrayUnpackingB);
