<?php

function show_msg($type, $msg){
    if($type=='' || $msg==''){
        return '';
    }
    if($type == 'success'){
        $class = 'success';
        $strong = 'Success ! ';
    }
    if($type == 'info'){
        $class = 'info';
        $strong = 'Info ! ';
    }
    if($type == 'warning'){
        $class = 'warning';
        $strong = 'Warning ! ';
    }
    if($type == 'danger'){
        $class = 'danger';
        $strong = 'Danger ! ';
    }
    return 
    "<div class='alert alert-$class fade in alert-dismissible' style='margin-top:18px;'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close' title='close'>×</a>
        <strong>$strong</strong> $msg
    </div>";
} 

?>