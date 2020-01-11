<?php

use PHPUnit\Framework\TestCase;
use Phparcyde\Configuration\GitHttpConfiguration;
use Phparcyde\Service\GitCloneHttpService;

class GitCloneHttpServiceTest extends TestCase
{
    const TMP = '..' . DS . 'tmp' . DS;

    public function testGitClone()
    {
        $config = new GitHttpConfiguration();
        $config
            ->setUrl()
            ->setBranch('master')
            ->setLocalDirectory(self::TMP);

        $service = new GitCloneHttpService($config);
    }
}