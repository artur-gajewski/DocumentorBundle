<?php

namespace Aga\DocumentorBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

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
            ->setDescription('Create project documentation with phpDocumentor2');
    }
    
    /**
     * Execution of the console command
     * 
     * This function checks all source code from the src folder, ignores this bundle's
     * files, and generates documentation HTML with phpDocumentor2.
     * 
     * @param InputInterface $input
     * @param OutputInterface $output 
     */
    protected function execute(InputInterface $input, OutputInterface $output) 
    {
        $output->writeln('Generating project documentation, please wait...');
        
        $rootDir = $this->getContainer()->get('kernel')->getRootDir();
        
        $source = realpath($rootDir . '/../src');
        $ignore = realpath($rootDir . '/../src/Aga');
        $target = realpath(__DIR__ . '/../Resources/public');
        
        $command = 'phpdoc -d ' . $source . ' -t ' . $target . ' --ignore ' . $ignore;
        exec($command);
        
        $output->writeln("Run the following command to install assets to the public folder:");
        $output->writeln("app/console assets:install --symlink web");
    }
}