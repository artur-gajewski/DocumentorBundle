<?php

namespace Aga\DocumentorBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\ArgvInput;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Process\Process;

/**
 * Command for the console
 * 
 * PhpDocumentorBundle's command to generate the project documentation with
 * phpDocumentor2. 
 * 
 * @author Artur Gajewski
 */
class DocumentorCommand extends ContainerAwareCommand {

    /**
     * Set the configuration for the command syntax and description 
     */
    protected function configure() 
    {
        $this->setName('documentation:create')
             ->setDescription('Creates project documentation with phpDocumentor2 accessible with project\'s url.');
    }
    
    /**
     * Execution of the console command
     * 
     * This function checks all source code from the src folder, ignores this bundle's
     * files, and generates documentation HTML with phpDocumentor2.
     * 
     * After a successful operation, it will install assets with app/console assets:install
     * 
     * @param InputInterface $input
     * @param OutputInterface $output 
     */
    protected function execute(InputInterface $input, OutputInterface $output) 
    {
        $output->writeln('Generating project documentation, please wait...');
        
        $rootDir = $this->getContainer()->get('kernel')->getRootDir();
        
        $source = realpath($rootDir . '/../src');
        $target = realpath(__DIR__ . '/../Resources/public');
        
        $phpDocPath = realpath($rootDir . '/../bin/phpdoc.php');
        $command = $phpDocPath . ' -d ' . $source . ' -t ' . $target;
        
        $process = new Process($command);
        $process->setTimeout(3600);
        $process->run();
        if (!$process->isSuccessful()) {
            throw new \RuntimeException($process->getErrorOutput());
        }

        echo $process->getOutput();

        $assetsCommand = $this->getApplication()->find('assets:install');

        $arguments = array(
            'command' => 'assets:install'
        );

        $input = new ArrayInput($arguments);
        $assetsCommand->run($input, $output);
    }
}
