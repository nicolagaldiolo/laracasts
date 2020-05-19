<?php
namespace Acme;
class DropboxFileSystem implements RemoteFileSystemInterface
{
    public function newRemoteFile()
    {
        var_dump('Create dropbox file.');
    }
    public function dropRemoteFile()
    {
        var_dump('Delete the dropbox file.');
    }
}