<?php

function neverReturns(): never
{
    try {
        $result = 1 / 0;
    } catch (Throwable $exception) {
        echo "{$exception->getMessage()}\n";
    }

    exit;
}

neverReturns();

echo "This is never executed because of the 'exit' in the closing of the function";