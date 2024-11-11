<?php

interface DocumentInterface 
{
    public function process(): void;

    public function getInfo(): array;
    
    public function getTitle(): string;
    
    public function getDescription(): string;
}