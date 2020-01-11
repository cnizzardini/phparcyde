<?php

namespace Phparcyde\Service;

use Gitonomy\Git\Admin;
use Phparcyde\Configuration\GitHttpConfiguration;

class GitCloneHttpService
{
    private $config;

    public function __construct(GitHttpConfiguration $config)
    {
        $this->config = $config;
        $this->config->exceptionHandler();
    }

    public function gitClone(string $url, string $localDirectory)
    {
        Admin::cloneBranchTo(
            $this->config->getLocalDirectory(),
            $this->config->getUrl(),
            $this->config->getBranch()
        );
    }
}