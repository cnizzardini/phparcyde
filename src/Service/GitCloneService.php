<?php

namespace Phparcyde\Service;

use Gitonomy\Git\Admin;
use Gitonomy\Git\Repository;
use Phparcyde\Configuration\GitServerConfiguration;

/**
 * Clones repository, supports HTTP, HTTPS, and SSH
 */
class GitCloneService
{
    private $config;

    public function __construct(GitServerConfiguration $config)
    {
        $this->config = $config;
        $this->config->exceptionHandler();
    }

    public function gitClone() : bool
    {
        $repo = Admin::cloneBranchTo(
            $this->config->getLocalDirectory(),
            $this->config->getRepository(),
            $this->config->getBranch()
        );

        return $repo instanceof Repository;
    }
}