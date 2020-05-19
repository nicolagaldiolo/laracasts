<?php
namespace Acme;

interface RemoteFileSystemInterface
{
    public function newRemoteFile();
    public function dropRemoteFile();
}