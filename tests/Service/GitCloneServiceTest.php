<?php

use PHPUnit\Framework\TestCase;
use Phparcyde\Configuration\GitServerConfiguration;
use Phparcyde\Service\GitCloneService;

class GitCloneServiceTest extends TestCase
{
    const URL = 'https://github.com/cnizzardini/phparcyde.git';
    const SSH = 'git@github.com:cnizzardini/phparcyde.git';
    const BRANCH = 'master';
    private $tmp;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->tmp = getcwd() . DIRECTORY_SEPARATOR;
        $this->tmp.= 'tests' . DIRECTORY_SEPARATOR . 'tmp' . DIRECTORY_SEPARATOR;
    }

    public function setUp()
    {
        parent::setUp();

        if (is_dir($this->tmp)) {
            $this->deleteFiles($this->tmp);
        }

        mkdir($this->tmp);
    }

    public function tearDown()
    {
        parent::tearDown();
        if (is_dir($this->tmp)) {
            $this->deleteFiles($this->tmp);
        }
    }

    public function testGitCloneHttps()
    {
        $config = new GitServerConfiguration();
        $config
            ->setRepository(self::URL)
            ->setBranch(self::BRANCH)
            ->setLocalDirectory($this->tmp);

        $service = new GitCloneService($config);
        $this->assertTrue($service->gitClone());
    }

    public function testGitCloneSsh()
    {
        $config = new GitServerConfiguration();
        $config
            ->setRepository(self::SSH)
            ->setBranch(self::BRANCH)
            ->setLocalDirectory($this->tmp);

        $service = new GitCloneService($config);
        $this->assertTrue($service->gitClone());
    }

    private function deleteFiles($target) {
        if(is_dir($target)){
            $files = glob( $target . '*', GLOB_MARK ); //GLOB_MARK adds a slash to directories returned

            foreach( $files as $file ){
                $this->deleteFiles( $file );
            }

            rmdir( $target );
        } elseif(is_file($target)) {
            unlink( $target );
        }
    }
}