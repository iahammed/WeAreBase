<?php
namespace Console;
use Symfony\Component\Console\Command\Command as SymfonyCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Console\Repository;

class Command extends SymfonyCommand
{
    
	public function __construct()
    {
        parent::__construct();
    }

    protected function PartialString(InputInterface $input, OutputInterface $output)
    {
    	$output -> writeln([
            '====**** UK Post Code Console App ****====',
            '=============== Partial Code ============',
            '',
        ]);
        $data = $this->getData(
                        'Partial', 
                        $input -> getArgument('PostCode')
                    );

        if($data){
            Repository::FileRepository( $data );
            $output -> writeln([
                '',
                '============ Data ===========',
                $data,
                '=========== Saved ===========',
            ]);
        } else {
            $output -> writeln([
                '============ Data not found ===========',
            ]);
        }

    }

    protected function LocationData(InputInterface $input, OutputInterface $output)
    {
        $output -> writeln([
            '====**** UK Post Code Console App ****====',
            '=========== latitude, longitude =========',
            '',
        ]);
        
        $data = $this->getData('Location', 
                    '' , 
                    $input -> getArgument('Latitude'), 
                    $input -> getArgument('Latitude') 
                );
        
        if($data){
            Repository::FileRepository( $data );
            $output -> writeln([
                '',
                '============ Data ===========',
                $data,
                '=========== Saved ===========',
            ]);
        } else {
            $output -> writeln([
                '============ Data not found ===========',
            ]);
        }

    }

    public function getData($flag, $data = '', $Latitude = '', $Longitude = '')
    {
        if($flag === 'Partial'){
            $url = "https://mapit.mysociety.org/postcode/partial/" . $data;
        } else {
            $url = "https://mapit.mysociety.org/point/27700/" . $Latitude . ',' . $Longitude;
        }

        $data = file_get_contents( $url );
        return $data;
    }

}