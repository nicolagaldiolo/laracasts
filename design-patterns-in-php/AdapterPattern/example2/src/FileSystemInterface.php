<?php
namespace Acme;

interface FileSystemInterface
{
    public function createFile();
    public function deleteFile();
}