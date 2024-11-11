<?php

namespace Interfaces\Documents;

interface DocumentInterface
{
    public function open();

    public function save($data, $update = true);

    public function process();

    public function getInfo();

    public function getTitle();

    public function getDescription();
}