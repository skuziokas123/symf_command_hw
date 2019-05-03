<?php

namespace App\AgeCalculator;

class AgeCalculatorManager {
    private $ageCalculator;
    
    public function __construct(AgeCalculator $ageCalculator){
        $this->ageCalculator=$ageCalculator;
        
    }
    
    public function execCalcAge($io, $input){
        $date_of_birth = $input->getArgument('date_of_birth');

        $date_of_birthObj=new \DateTime($date_of_birth);

        $age=$this->ageCalculator->calculate($date_of_birthObj);
        $io->note('I am '.$age.' years old');
        if ($input->getOption('adult')) {
            $isAdult=$this->ageCalculator->isAdult($date_of_birthObj);
            if($isAdult){
                $io->success('Am I an adult? --- YES !!');
            }else{
                $io->warning('Am I an adult? --- NO !!!');
            }

        }

    }
}
