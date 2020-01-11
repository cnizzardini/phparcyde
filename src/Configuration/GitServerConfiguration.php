<?php

namespace Phparcyde\Configuration;

use Phparcyde\Exception as Fatal;

/**
 * Configuration for Git Server.
 * - $repository must be a valid HTTP, HTTPS, or SSH server
 */
class GitServerConfiguration
{
    private $repository;
    private $localDirectory;
    private $branch = 'master';

    public function exceptionHandler() : void
    {
        if (!is_dir($this->localDirectory)) {
            throw new Fatal\DirectoryPathException('Invalid local directory: ' . $this->localDirectory);
        }

        if (empty($this->branch)) {
            throw new Fatal\BranchException('Invalid branch');
        }
    }

    public function getRepository()
    {
        return $this->repository;
    }

    public function setRepository(string $repository) : self
    {
        $this->repository = $repository;
        return $this;
    }

    public function getLocalDirectory()
    {
        return $this->localDirectory;
    }

    public function setLocalDirectory(string $localDirectory) : self
    {
        $this->localDirectory = $localDirectory;
        return $this;
    }

    public function getBranch()
    {
        return $this->branch;
    }

    public function setBranch(string $branch) : self
    {
        $this->branch = $branch;
        return $this;
    }
}