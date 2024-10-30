<?php

interface DocumentInterface
{
    public function open();

    public function getInfo();

    public function getTitle(): string;

    public function getDescription(): string;
}