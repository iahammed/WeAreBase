<?php
namespace Console;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Console\Command;

class WeAreBasePartial extends Command {

	protected function configure()
    {
    	$this->setName('WeAreBasePartial')
    			->setDescription('UK Partial Post Code')
    			->setHelp('This command allows you to save your Post Code ')
    			->addArgument('PostCode', InputArgument::REQUIRED, 'The Post Code of UK.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
    	$this->PartialString($input, $output);
    }

    
} 
