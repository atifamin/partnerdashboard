<?php

function e($string, $ucfirst = false) {

    if (lang($string)) {

        if ($ucfirst)
            return ucfirst(lang($string));
        else
            return lang($string);

    } else {
        
        /*
        $CI = & get_instance();

        echo "***";
        $add = '$lang[\'' . str_replace('\"', '"', addslashes($string)) . '\'] = \'' . str_replace('\"', '"', addslashes($string)) . '\';' . PHP_EOL;

        $language = $CI->config->item('language');

        file_put_contents('./application/language/' . $language . '/'.$language.'_lang.php', $add, FILE_APPEND | LOCK_EX);

        $CI->lang->is_loaded = array();

        $CI->load->language($language, $language);
        */

        if ($ucfirst)
            return ucfirst($string);
        else
            return $string;

    }


}

function print_date($input)
{
    $CI = &get_instance();  //get instance, access the CI superobject
    $format = $CI->session->userdata('conf_date_format');

    if ($format == 1) {

        $converted = date("Y-m-d H:i", strtotime($input));

    } else if ($format == 2) {

        $converted = date("d-m-Y H:i", strtotime($input));

    } else if ($format == 3) {

        $converted = date("m-d-Y h:i A", strtotime($input));

    }

    return $converted;
}

function get_datetimepicker_format()
{
    $CI = &get_instance();  //get instance, access the CI superobject
    $format = $CI->session->userdata('conf_date_format');

    if ($format == 1) {

        $converted = 'YYYY-MM-DD H:mm';

    } else if ($format == 2) {

        $converted = 'DD-MM-YYYY H:mm';

    } else if ($format == 3) {

        $converted = 'MM-DD-YYYY H:mm';

    }

    return $converted;
}
function get_container_total($container_id){
    $CI = &get_instance();  //get instance, access the CI superobject
    //print_r($CI->session->userdata('partner_type'));exit;
    $partner_type = $CI->session->userdata('partner_type');
    $boardId = $CI->session->userdata('board_id');
    
    
    $query = $CI->db->query("SELECT SUM(task_funding_amount_requested) AS total FROM tasks, user_fastfund_form1 ff WHERE tasks.task_id=ff.task_id AND task_type='".$partner_type."' AND task_container=$container_id");
    $data =  $query->result_array()[0];
    return $data['total'];
}
function nice_number($n,$Type=NULL) {
    if($Type == 'format'){
        // first strip any formatting;
        $n = (0+str_replace(",", "", $n));
        // is this a number?
        if (!is_numeric($n)) return false;
        // now filter it;
        if ($n >= 1000000000000) return round(($n/1000000000000), 1).'T';
        elseif ($n >= 1000000000) return round(($n/1000000000), 1).'B';
        elseif ($n >= 1000000) return round(($n/1000000), 1).'M';
        elseif ($n >= 1000) return round(($n/1000), 1).'K';
        elseif ($n < 1000) return round(($n), 1);
        return number_format($n);
    }else{
        // first strip any formatting;
        $n = (0+str_replace(",", "", $n));
        // is this a number?
        if (!is_numeric($n)) return false;
        // now filter it;
        if ($n >= 1000000000000) return round(($n/1000000000000), 1);
        elseif ($n >= 1000000000) return round(($n/1000000000), 1);
        elseif ($n >= 1000000) return round(($n/1000000), 1);
        elseif ($n >= 1000) return round(($n/1000), 1);
        elseif ($n < 1000) return round(($n), 1);
        return number_format($n);
    }
}
?>