<?php

namespace Phparcyde\Configuration;

use Phparcyde\Exception as Fatal;

class GitHttpConfiguration
{
    private $url;
    private $localDirectory;
    private $branch = 'master';

    public function exceptionHandler() : void
    {
        if (!filter_var($this->url,FILTER_VALIDATE_URL)) {
            throw new Fatal\UrlException('Invalid git URL');
        }

        if (file_exists($this->localDirectory)) {
            throw new Fatal\DirectoryPathException('Invalid local directory');
        }

        if (empty($this->branch)) {
            throw new Fatal\BranchException('Invalid branch');
        }
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl(string $url) : self
    {
        $this->url = $url;
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