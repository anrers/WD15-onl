<?php
class Book
{
    public function __construct(
        public int $id,
        public string $title,
        public int $authorId,
        public int $isAvailabe,
    ) {}
}