<?php

require 'vendor/autoload.php';
use \Acme\FileSystem;
use \Acme\RemoteFileSystemAdapter;
use \Acme\AmazonFileSystem;
use \Acme\DropboxFileSystem;
use \Acme\FileSystemInterface;

class manageFile
{
    private $fileSystem;
    public function __construct(FileSystemInterface $fileSystem)
    {
        $this->fileSystem = $fileSystem;
    }
    public function manage()
    {
        $this->fileSystem->createFile();
        $this->fileSystem->deleteFile();
    }
}

(new manageFile(new FileSystem))->manage();
(new manageFile(new RemoteFileSystemAdapter(new DropboxFileSystem)))->manage();
(new manageFile(new RemoteFileSystemAdapter(new AmazonFileSystem)))->manage();