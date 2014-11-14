<?php 
namespace ComposerUI\Tests;

use Composer\Util\Filesystem;

class TestCase extends \Illuminate\Foundation\Testing\TestCase
{

    /**
     * Creates the application.
     *
     * @return \Symfony\Component\HttpKernel\HttpKernelInterface
     */
    public function createApplication()
    {
        $unitTesting = true;

        $testEnvironment = 'testing';

        return require __DIR__ . '/../../bootstrap/start.php';
    }

    protected function ensureDirectoryExistsAndClear($directory)
    {
        $fs = new Filesystem();
        if (is_dir($directory))
        {
            $fs->removeDirectory($directory);
        }
        mkdir($directory, 0777, true);
    }

}
