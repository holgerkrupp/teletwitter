<?php

   function my_json_decode($s) {
        $s = str_replace(
            array('"',  "'"),
            array('\"', '"'),
            $s
        );
        $s = preg_replace('/(\w+):/i', '"\1":', $s);
        return json_decode(sprintf('{%s}', $s));
    }
?>