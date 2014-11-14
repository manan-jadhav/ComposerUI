<?php namespace ComposerUI\Tests;

use Composer\Json\JsonFile;
use ComposerUI\ComposerUI;
use Symfony\Component\Console\Output\StreamOutput;
use ArrayObject;

class ComposerUICoreTest extends TestCase
{    
    public function testInstall()
    {
        $testInstallDir = realpath(sys_get_temp_dir()) . DIRECTORY_SEPARATOR . "composerui-test" . DIRECTORY_SEPARATOR . "install-test";
        $this->ensureDirectoryExistsAndClear($testInstallDir);
        $composerJson = $testInstallDir.DIRECTORY_SEPARATOR."composer.json";
        $outputFile = fopen($testInstallDir.DIRECTORY_SEPARATOR."output.txt",'w');
        
        $this->assertTrue(file_put_contents($composerJson,'{}') !== FALSE);
        $this->assertTrue(fwrite($outputFile,' ') !== FALSE);
        
        $file = new JsonFile($composerJson);
        $file->write(new ArrayObject(
                array("require" => new ArrayObject(
                        array("seld/jsonlint" => "1.0")
                        )
                    )));
        
        $this->assertTrue(ComposerUI::runInstallCommand($testInstallDir,new StreamOutput($outputFile)));
        $this->assertTrue(is_dir($testInstallDir.DIRECTORY_SEPARATOR.'vendor'));
        $this->assertTrue(is_dir($testInstallDir.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'seld'));
    }

}
