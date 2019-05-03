<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use App\AgeCalculator\AgeCalculatorManager;

class AgeCalculatorCommand extends Command
{
    protected static $defaultName = 'app:age:calculator';
    
    private $ageCalculatorManager;
    
    public function __construct(AgeCalculatorManager $ageCalculatorManager){
        $this->ageCalculatorManager=$ageCalculatorManager;
        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setDescription('Age calculator')
            ->addArgument('date_of_birth', InputArgument::REQUIRED, 'Argument date of birth')
            ->addOption('adult', null, InputOption::VALUE_NONE, 'Option adult')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        
        $this->ageCalculatorManager->execCalcAge($io, $input);
       
    }
}
