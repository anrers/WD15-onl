<?php
class Book
{
    public function __construct(
        public int $id,
        public string $title,
        public int $autorId,
        public int $isAvailabe,
    ) {}
}