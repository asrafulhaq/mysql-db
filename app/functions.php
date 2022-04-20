<?php 


/**
 * Create validation 
 */
function validate($msg, $type = 'danger'){
    return "<p class=\"alert alert-{$type}\"> {$msg} <button class=\"close\" data-dismiss=\"alert\">&times;</button> </p>";
}


/**
 * Grade & GPA Cal 
 */
function gpa($marks){

    $gpa = '';


    if($marks >= 0 && $marks < 33){
        $gpa = 0;

    }else if($marks >= 33 && $marks < 40){
        $gpa = 1;

    }else if($marks >= 40 && $marks < 50){
        $gpa = 2;

    }else if($marks >= 50 && $marks < 60){
        $gpa = 3;

    }else if($marks >= 60 && $marks < 70){
        $gpa = 3.5;

    }else if($marks >= 70 && $marks < 80){
        $gpa = 4;
 
    }else if($marks >= 80 && $marks <= 100){
        $gpa = 5;

    }else{
        $gpa = 'invalid';

    }

    return $gpa;

}



/**
 * Grade & GPA Cal 
 */
function grade($marks){


    $grade = '';

    if($marks >= 0 && $marks < 33){
 
        $grade = 'F';
    }else if($marks >= 33 && $marks < 40){
   
        $grade = 'D';
    }else if($marks >= 40 && $marks < 50){
  
        $grade = 'C';
    }else if($marks >= 50 && $marks < 60){
  
        $grade = 'B';
    }else if($marks >= 60 && $marks < 70){
 
        $grade = 'A-';
    }else if($marks >= 70 && $marks < 80){

        $grade = 'A';
    }else if($marks >= 80 && $marks <= 100){
   
        $grade = 'A+';
    }else{

        $grade = 'invalid';
    }

    return $grade;


}


/**
 * CGPA 
 */
function cgpa($bn, $en, $math, $sci, $ssci, $reli){

    $total_gpa = gpa($bn) + gpa($en) + gpa($math) + gpa($sci) + gpa($ssci) + gpa($reli);

    if($bn < 33 || $en < 33 || $math < 33 || $sci < 33 || $ssci < 33 || $reli < 33  ) {
        return '';
   }else {
        return $total_gpa / 6;
   }

    


}


/**
 * CGPA 
 */
function result($bn, $en, $math, $sci, $ssci, $reli){

   if($bn < 33 || $en < 33 || $math < 33 || $sci < 33 || $ssci < 33 || $reli < 33  ) {
        return '<span style="color:red;font-weight:bold;">Failed<span></span></span>';
   }else {
        return '<span style="color:green;font-weight:bold;">Passed<span></span></span>';
   }

}







?>