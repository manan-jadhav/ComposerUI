<?php
namespace ComposerUI;

use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\ArrayInput;
use Composer\Console\Application as Composer;

class ComposerUI
{
    static public function runInstallCommand($workingDir,OutputInterface $output = null)
    {
        $input = new ArrayInput(['command'=>"install", "-vvv"=>"", "-d" => $workingDir]);
        $app = new Composer();
        $app->setAutoExit(false);
        return $app->run($input,$output) == 0;
    }
}
