<?php namespace Acme;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Helper\TableCell;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ShowCommand extends Command{

    public function configure()
    {
        $this->setName('show')
            ->setDescription('Offer the information of the movie.') 
            ->addArgument('movie',  InputArgument::REQUIRED, 'Name of the movie.')
            ->addOption('fullPlot', null, InputOption::VALUE_OPTIONAL, 'Shows the plot of the movie.', 'short');
    }

    public function execute(InputInterface $input, OutputInterface $output):int
    {

        $title = $input->getArgument('movie');
        $plot = $input->getOption('fullPlot');
        if(!$plot){
            $plot = 'full';
        }
       $api_url = 'http://www.omdbapi.com/?apikey=13343833&t='. $title .'=&plot=' . $plot;
        // Read JSON file
        $json_data = file_get_contents($api_url);

        // Decode JSON data into PHP array
        $response_data = json_decode($json_data);

        // Print data if need to debug
        //print_r($response_data);

        $movie = (array) $response_data;
        print_r($movie);

        $table = new Table($output);


       /*$table->setHeaders([$movie['Title'] . ' - ' . $movie['Year']]);
            foreach($movie as $key => $value){
                if($value == null || is_numeric($value) || is_string($value) ){
                    $table->setRow($key,[$value]);
                     
                }
            }
            $table->render();

          
        return 0;
        */

       /* $table->setHeaders([$movie['Title'] . ' - ' . $movie['Year']]);
        foreach($movie as $key => $value){
            if($key!='Ratings' ){
                
                $table->setRow($key,[$value]);
                //$table->setRow($key,[$key]);
                //$table->setRows($key,[$value]);
                
                 
            }
        }
        $table->render();*/


        $movieWithoutRatings = [];

        foreach($movie as $key =>$value){
            if($key != 'Ratings'){
                $movieWithoutRatings[] = [$key, $value];
            }
        }

        $table->setHeaders([$movie['Title'] . ' - ' . $movie['Year']])
        
                ->setRows($movieWithoutRatings )
            
                ->render();

        
    return 0; 

    }

    
}

