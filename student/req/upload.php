<?php

    print_r($_FILES);

    function get_size($size){
        $kb_size = $size / 1024;
        $format_size = number_format($kb_size, 2);
        return $format_size;

    }
    echo $_FILES['1x1_Picture']['size'];
    echo $_FILES['form_137']['size'];
    echo $_FILES['Birth_Certificate']['size'];