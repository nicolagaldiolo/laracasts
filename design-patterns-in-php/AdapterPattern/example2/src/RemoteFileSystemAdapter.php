<?php

namespace Acme;

class RemoteFileSystemAdapter implements FileSystemInterface
{
    private $remoteFileSystem;
    public function __construct(RemoteFileSystemInterface $remoteFileSystem)
    {
        $this->remoteFileSystem = $remoteFileSystem;
    }

    public function createFile()
    {
        $this->remoteFileSystem->newRemoteFile();
    }
    public function deleteFile()
    {
        $this->remoteFileSystem->dropRemoteFile();
    }
}