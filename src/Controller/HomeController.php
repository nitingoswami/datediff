<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\TableRegistry;

class HomeController extends AppController
{
   
    CONST VALID_FORMAT = [
            'Y Year(s) M Month(s) D day(s)',
            'D day(s)',
    ];
    public function index()
    {   
       $this->viewBuilder()->layout('default');

       if($this->request->is('post')){

           $status['status'] = 'error';
           $status['msg']    = 'Something went wrong. Please try again.';

          if(isset($this->request->data['startDate']) && isset($this->request->data['endDate']) ){
               
               $startDate = date('Y-m-d',strtotime($this->request->data['startDate']));
               $endDate   = date('Y-m-d',strtotime($this->request->data['endDate']));

               if($startDate > $endDate ){
                   $temp      = $startDate;
                   $startDate = $endDate;
                   $endDate   = $temp;
               }
			   
			   if($this->_checkValidFormats('D day(s)')){
					$text = $this->_calculateDateDiff($startDate,$endDate , 'D day(s)' ); 
					$status['status'] = 'success'; 
					$status['msg']    = $text; 
					
					if(Configure::read('Settings._db_._save_result')){
						$this->loadModel('Calculations');
						
						$calculation = $this->Calculations->newEntity();
						$calculation->start_date = $startDate;
						$calculation->end_date   = $endDate;
						$calculation->result     = $text;
						$calculation->created    = date('Y-m-d H:i:s');
						$calculation->modified     = date('Y-m-d H:i:s');
						
						$this->Calculations->save($calculation);
						
					}
			   }

           }else{
              $status['msg']    = 'Enter Start and end Dates.'; 
           }

           echo json_encode($status); die;
          
       }
	   
	 
    }


    function _calculateDateDiff($startDate,$endDate,$format){

        if($format == 'D day(s)'){
            $daysBetweenYears = $this->_getNoOfDaysBitweenYears( date('Y',strtotime($startDate)) , date('Y',strtotime($endDate)) );

            
            $pastDays = $this->daysInYearTillDate(date('Y',strtotime($startDate)) , date('m',strtotime($startDate)),  date('d',strtotime($startDate)) );
            
            $addDays  = $this->daysInYearTillDate(date('Y',strtotime($endDate)) , date('m',strtotime($endDate)), date('d',strtotime($endDate)) );
          
            $years  = 0;
            $months = 0;
            $days   = $daysBetweenYears - $pastDays + $addDays ;

            return $this->_formatText($years,$months,$days);
        }
        $years = $this->_calculateYears( date('Y',strtotime($startDate)) , date('Y',strtotime($endDate)) );
        $months = $this->_calculateYears( date('m',strtotime($startDate)) , date('m',strtotime($endDate)) );
        $days = $this->_calculateYears( date('d',strtotime($startDate)) , date('d',strtotime($endDate)) );

        return $this->_formatText($years,$months,$days);
    }



    function _calculateYears($startYear, $endYear){
       return $endYear > $startYear ? $endYear - $startYear : 0;
    }


    function _calculateMonths($startMonth, $endMonth){
       return $endMonth > $startMonth ? $endMonth - $startMonth : 0;
    }


    function _calculateDays($startDay, $endDay){
       return $endDay > $startDay ? $endDay - $startDay : 0;
    }

    function _formatText($years, $months , $days ){
         $text = '';
         if($years)
            $text .= $years  == 1 ? '1 Year ' : $years.' Years ';

         if($months)
            $text .= $months == 1 ? '1 Month ' : $months.' Months ';

         if($days)
            $text .= $days   == 1 ? '1 Day ' : $days.' Days ';

         return $text == '' ? '0 Day' : $text;
    }


    function _checkValidFormats($format){
        if(in_array($format,self::VALID_FORMAT)){
            return true;
        }
        return false;
       
    }

    function getDays($year,$month,$date){
      
        $year = $year - 1;
        $month = $month + 12;
        return ( 365*$year + $year/4) - ( $year/100 + $year/400 + $date + (153*($month)+8)/5 );
    }


    function daysInMonths($year = null){
        $isLeapYear = false;

        if($year){
           $isLeapYear = $this->_isLeapYear($year);
        }

        $febDay = $isLeapYear ? 29 : 28;

        return [
            31,$febDay,31,
            30,31,30,
            31,31,30,
            31,30,31
        ];

    }

    function daysInYear($year = null){
        $isLeapYear = false;

        if($year){
           $isLeapYear = $this->_isLeapYear($year);
        }

        $febDay = $isLeapYear ? 29 : 28;

        return array_sum([
            31,$febDay,31,
            30,31,30,
            31,31,30,
            31,30,31
        ]);

    }


    function daysInYearTillDate($year, $month, $date ){

        $daysInMonth    = $this->daysInMonths($year);
        return ( array_sum(array_slice($daysInMonth, 0,$month - 1)) + $date );


    }

    function _isLeapYear($year){
        if( ($year%400 == 0 || $year%100 != 0) && ($year%4 == 0))
            return true;
        return false;
    }


    function _getNoOfDaysBitweenYears($startYear,$endYear){
        $leapYearsCount = $this->_calculateNoOfLeapYears($startYear,$endYear);
        return ( ( $endYear - $startYear ) * 365 ) + $leapYearsCount;
    }

    function _calculateNoOfLeapYears($startYear , $endYear ){
        
        $leapYears = [];
        for($i= $endYear; $i >= $startYear ; $i--){


            if($this->_isLeapYear($i)){
              array_push($leapYears,$i);  
            }
            
        }

        return count($leapYears);

    }
        
   
}
