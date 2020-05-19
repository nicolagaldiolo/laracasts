<?php
namespace Acme;
class FileSystem implements FileSystemInterface
{
    public function createFile()
    {
        var_dump('Create local file.');
    }
    public function deleteFile()
    {
        var_dump('Delete the local file.');
    }
}