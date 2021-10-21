<?php

class ExampleCallable
{
    public static function foo(string $content = 'foo'): void
    {
        echo "$content\n";
    }

    public function bar(string $content): void
    {
        // Before: $toUpper = [$this, 'toUpper'];
        // After:
        $toUpper = $this->toUpper(...);
        echo "{$toUpper($content)}\n";
    }

    private function toUpper(string $content): string
    {
        $strUpper = strtoupper(...);
        return $strUpper($content);
    }
}

$content = 'Mussum Ipsum, cacilds vidis litro abertis.';

// Before: Closure::fromCallable([ExampleCallable::class, 'foo'])
// After:
$foo = ExampleCallable::foo(...);
$foo();
$foo($content);

(new ExampleCallable)->bar($content);
