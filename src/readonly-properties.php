<?php

class BlogPost
{
    public function __construct(public readonly int $id, public string $title)
    {}

    public function __toString(): string
    {
        return "Id: {$this->id}\nTitle: {$this->title}\n";
    }
}

$blogPost = new BlogPost(1, 'Readonly Properties');

echo "$blogPost\n";

$blogPost->id += 1; // Fatal error: Uncaught Error: Cannot modify readonly property BlogPost::$id
$blogPost->title = "$blogPost->title - Updated";

echo "$blogPost\n";
