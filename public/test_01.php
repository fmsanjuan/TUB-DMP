<?php
$data = array(
        array('id' => 1, 'name' => 'Bob', 'position' => 'Clerk'),
        array('id' => 2, 'name' => 'Alan', 'position' => 'Manager'),
        array('id' => 3, 'name' => 'James', 'position' => 'Director')
);

$names = array_map( function($answer) {  
            if( is_array($answer) ) {
                $answer = implode( '|', $answer );
            }
            return $answer;            
        },
        $data
);

print_r($names);