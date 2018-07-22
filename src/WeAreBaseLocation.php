<?php
namespace Console;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Console\Command;

class WeAreBaseLocation extends Command {

    protected function configure()
    {
      $this->setName('WeAreBaseLocation')
  			->setDescription('UK Latitude, Longitude')
    		->setHelp('This command allows you to save your Post Code ')
        ->addArgument('Latitude', InputArgument::REQUIRED, 'Latitude')
    		->addArgument('Longitude', InputArgument::REQUIRED, 'Longitude');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
      // exec('say "Hello world! 5 + 5 is = 10"');
    	$this->LocationData($input, $output);
    }


} 
