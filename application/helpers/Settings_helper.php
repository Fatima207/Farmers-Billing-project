<?php

class Settings_helper {
    public function getValueFromSettings($key, $jsonValue) {
    	foreach($settings as $set) { 
	        $jsonData = json_decode($set['key_value'], true);
	        if(isset($jsonData['new_job_email_notification'])) {
	            $email_ID = $jsonData['new_job_email_notification'];
	        }
    	}
    }
}