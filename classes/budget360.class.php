<?php
    //Author: John Allen
    class Budget360 {
          //constructor
       function __construct(){}
          //destructor
       function __destruct(){}
        //calculate expenditure tota
       function addItemTotal($val, $rate){
            $itemtotal;
            if($rate == "weekly"){
                $itemtotal = $val * 4;
            } else if($rate == "monthly") {
                $itemtotal = $val;
            } else {
                $itemtotal = $val / 12;
            }
            return $itemtotal;
        }
        //total housing
        function totalHousing($rent, $mortgageprotection, $gas, $electricity, $broadband, $phone, $waste, $tv){
            $totalhousing;
            $totalhousing = $rent + $mortgageprotection + $gas + $electricity + $broadband + $phone + $waste + $tv;
            return $totalhousing;
        }
        //total travel
        function totalTravel($carpayments, $vehicletax, $vehiclefuel, $vehicleinsurance, $commuting){
            $totaltravel;
            $totaltravel = $carpayments + $vehicletax + $vehiclefuel + $vehicleinsurance + $commuting;
            return $totaltravel;
        }
        //total food and housekeeping
        function totalHouskeeping($groceries, $lunch, $kidslunch, $personalitems, $literature){
            $totalhouskeeping;
            $totalhouskeeping = $groceries + $lunch + $kidslunch + $personalitems + $literature;
            return $totalhouskeeping;
        }
        //total protection
        function totalProtection($homeinsurance, $lifeprotection, $healthinsurance, $pension, $incomeprotection){
            $totalprotection;
            $totalprotection = $homeinsurance + $lifeprotection + $healthinsurance + $pension + $incomeprotection;
            return $totalprotection;
        }
        //total Bad Habits
        function totalBadHabits($smoking, $drinking, $snacks, $fastfood, $gambling, $parkingtickets, $fines){
            $totalbadhabits;
            $totalbadhabits = $smoking + $drinking + $snacks + $fastfood + $gambling + $parkingtickets + $fines;
            return $totalbadhabits;
        }
        //total Good Habits
        function totalGoodHabits($entertainment, $gym, $holidays, $petexpense, $savings){
            $totalgoodhabits;
            $totalgoodhabits = $entertainment + $gym + $holidays + $petexpense + $savings;
            return $totalgoodhabits;
        }
        //total loans and credit cards
        function totalLoans($c1,$c2, $c3, $l1, $l2, $l3, $l4, $l5){
            $totalloans;
            $totalloans = $c1 + $c2 + $c3 + $l1 + $l2 + $l3 + $l4 + $l5;
            return $totalloans;
        }
    }
?>