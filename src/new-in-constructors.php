<?php

class Author
{
    public function __construct(public string $name = '', public string $email = '')
    {}

    public function __toString(): string
    {
        return "\tName: $this->name\n\tE-mail: $this->email\n";
    }
}

class BlogPost
{
    public function __construct(
        public string $title,
        public Author $author = new Author()
    )
    {}

    public function __toString(): string
    {
        return "Title: $this->title\nAuthor:\n$this->author\n";
    }
}

echo new BlogPost(title: 'New in Constructos');
echo new BlogPost('New in Constructos', new Author('Daniel Neto', 'daniel@danielneto.dev.br'));
