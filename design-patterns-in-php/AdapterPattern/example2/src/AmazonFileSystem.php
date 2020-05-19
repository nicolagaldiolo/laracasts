<?php
namespace Acme;
class AmazonFileSystem implements RemoteFileSystemInterface
{
    public function newRemoteFile()
    {
        var_dump('Create amazon file.');
    }
    public function dropRemoteFile()
    {
        var_dump('Delete the amazon file.');
    }
}