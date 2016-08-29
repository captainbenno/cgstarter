<?php

error_reporting(-1);
ini_set('display_errors', 1);


$json = file_get_contents("../../data1.json");


$jsonIterator = new RecursiveIteratorIterator(
new RecursiveArrayIterator(json_decode($json, TRUE)),
RecursiveIteratorIterator::SELF_FIRST);

$found_start_of_users = 0;
$new_entry=1;

foreach ($jsonIterator as $key => $val) {
    if($key == 'users' && $found_start_of_users == 0){
        $found_start_of_users = 1;
    }
    if($found_start_of_users == 1) {
        if($new_entry==1){
            $entry_data = array();
            $new_entry=0;
        }
        if (!is_array($val)) {
            $entry_data[$key] = $value;
            echo "$key => $val</br>";
            if($key == 'custom_fields_address'){
                //save the data

                $new_entry=1;
            }
        }
    }
}


/*
 user_album_art_id => 7205
user_album_id =>
album_id => 2
user_id => 452354
art_id => 1403710
arrange => 1
deleted => 0
threadid => 1403714
json_custom_fields => {"address":"2948 Del Loma Drive, Campbell CA, 95008","name":"Catie Vercammen-Grandjean","dropbox":"","file":""}
date_created => 2016-08-26 00:59:36
date_updated => 2016-08-26 00:59:36
category => 2D
category_title => Portrait
image_orig => https://s3.amazonaws.com/cgimg/t/g54/452354/1403710_orig.jpg
image_large => https://s3.amazonaws.com/cgimg/t/g54/452354/1403710_large.jpg
username => mordicantflame
email => catievg@gmail.com
givenname => Catie
custom_fields_full_name => Catie Vercammen-Grandjean
custom_fields_high_res_image => https://s3.amazonaws.com/cgimg/t/g54/452354/1403710_orig.jpg
custom_fields_address => 2948 Del Loma Drive, Campbell CA, 95008

 */
