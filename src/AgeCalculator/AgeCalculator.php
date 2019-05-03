<?php



namespace App\AgeCalculator;


class AgeCalculator {
    const IS_ADULT_FROM_YEARS=18;
    
    public function calculate($date_of_birth){
        $interval = date_diff($date_of_birth, new \DateTime());
   
        return $interval->format('%y');
    }
    
    public function isAdult($date_of_birth){
        $isAdult=FALSE;
        $age=$this->calculate($date_of_birth);
        if($age>= self::IS_ADULT_FROM_YEARS){
            $isAdult=TRUE;
        }
        return $isAdult;
    }
    
}
