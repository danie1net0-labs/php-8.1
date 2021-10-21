<?php

interface UuidInterface
{
    public function getUuid(): string;
}

interface SlugInterface
{
    public function getSlug(): string;
}

interface UrlInterface extends UuidInterface, SlugInterface // Is no more needed
{
}

trait HasUuid
{
    public function getUuid(): string
    {
        return '3f1af7ad-86ea-4e82-b49f-3d238eeced7b';
    }
}

trait HasSlug
{
    public function getSlug(): string
    {
        return 'pure-intersection-types';
    }
}

class GenerateUrl
{
    // Before:
    public function getUrlBefore(UrlInterface $url): string
    {
        return "{$url->getSlug()}/{$url->getUuid()}";
    }

    // After: UrlInterface is no longer needed
    public function getUrlAfter(UuidInterface&SlugInterface $url): string
    {
        return "{$url->getSlug()}/{$url->getUuid()}";
    }
}

// Before
class ArticleBefore implements UrlInterface
{
    use HasUuid, HasSlug;
}

// After
class ArticleAfter implements UuidInterface, SlugInterface
{
    use HasUuid, HasSlug;
}

$generateUrl = new GenerateUrl();

echo "{$generateUrl->getUrlBefore(new ArticleBefore())}\n";
echo "{$generateUrl->getUrlAfter(new ArticleAfter())}\n";