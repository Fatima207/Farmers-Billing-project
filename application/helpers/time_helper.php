<?php
/* below checkLeaveDate function fail on case may -2019 */
// function checkLeaveDate($y, $m){
//     if($y=='' || $m==''){
//         return '';
//     }
//     $arr = new DatePeriod(
//         new DateTime("first friday of $y-$m"),
//         DateInterval::createFromDateString('next friday'),
//         new DateTime("last day of $y-$m")
//     );
//     pr($arr); exit;
//     $fridays = array();
//     foreach($arr as $friday){
//         pr($friday);
//         $fridays[] = $friday->format("j");
//     }
//     return $fridays;
// }

function checkLeaveDate($year, $month) {
    $base_date = strtotime($year . '-' . $month . '-01');
    $wed = strtotime('first friday of ' . date('F Y', $base_date));

    $fridaysCol = array();

    do {
        $fridaysCol[] = new DateTime(date('r', $wed));
        $wed = strtotime('+7 days', $wed);
    } while (date('m', $wed) == $month);

    $fridays = array();
    foreach($fridaysCol as $friday) {
        $fridays[] = $friday->format("j");
    }
    return $fridays;
}

function getMinMax($dateArray){
    if(empty($dateArray)){
        return 0;
    } else {
        foreach($dateArray as $date) {
            strtotime($date);
        }
    }
}
function show_y_m_d($maxDate, $minDate){
    $datetime1 = new DateTime($minDate);
    $datetime2 = new DateTime($maxDate);
    $interval = $datetime1->diff($datetime2);
    return $interval->format('%y Years %m Months and %d Days');
}
function date_diff_in_month($date_1, $date_2) {
    $date1 = DateTime::createFromFormat("m-d-Y" , $date_1);
    $date2 = DateTime::createFromFormat("m-d-Y" , $date_2);
    $interval = date_diff($date1, $date2);
    return $interval->m;
    //return $interval->m + ($interval->y * 12);
}

function mdyToymd($date) {
    //$date = $date_1;
    $date = DateTime::createFromFormat("m-d-Y" , $date);
    return $date->format('Y-m-d');
}

?>