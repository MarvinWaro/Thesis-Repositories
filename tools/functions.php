<?php

function validate_first_name($POST){
    if(!isset($POST['firstname'])){
        return false;
    }else if(strlen(trim($POST['firstname']))<1){
        return false;
    }
    return true;
}

function validate_last_name($POST){
    if(!isset($POST['lastname'])){
        return false;
    }else if(strlen(trim($POST['lastname']))<1){
        return false;
    }
    return true;
}

function validate_username($POST){
    if(!isset($POST['username'])){
        return false;
    }else if(strlen(trim($POST['username']))<1){
        return false;
    }
    return true;
}

//Email Function

function validate_email($POST){
    // Remove all illegal characters from email
    $email = filter_var($POST['email'], FILTER_SANITIZE_EMAIL);

    // Validate e-mail
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Separate string by @ characters (there should be only one)
        $parts = explode('@', $email);

        // Remove and return the last part, which should be the domain
        $domain = array_pop($parts);

        // Check if the domain is WMSU
        if (strcmp(strtolower($domain), 'wmsu.edu.ph') != 0)
        {
            return false;
        }
    } else {
        return false;
    }
    return true;
}

function validate_course($POST){
    if(!isset($POST['course'])){
        return false;
    }else if(strcmp($POST['course'], 'None') == 0){
        return false;
    }
    return true;
}

function validate_year_and_section($POST){
    if(!isset($POST['year_and_section'])){
        return false;
    }else if(strcmp($POST['year_and_section'], 'None') == 0){
        return false;
    }
    return true;
}

function validate_semester($POST){
    if(!isset($POST['sem'])){
        return false;
    }else if(strcmp($POST['sem'], 'None') == 0){
        return false;
    }
    return true;
}

function validate_adviser($POST){
    if(!isset($POST['your_adviser'])){
        return false;
    }else if(strcmp($POST['your_adviser'], 'None') == 0){
        return false;
    }
    return true;
}

function validate_group_no($POST){
    if(!isset($POST['your_group'])){
        return false;
    }else if(strcmp($POST['your_group'], 'None') == 0){
        return false;
    }
    return true;
}





function validate_add_student($POST){
    if(!validate_first_name($POST) || !validate_last_name($POST) || !validate_username($POST) || !validate_email($POST)
     || !validate_course($POST) || !validate_year_and_section($POST) || !validate_semester($POST)
     || !validate_adviser($POST) || !validate_group_no($POST)){
        return false;
     }
    return true;
}


function validate_department($POST){
    if(!isset($POST['department'])){
        return false;
    }else if(strcmp($POST['department'], 'None') == 0){
        return false;
    }
    return true;
}


function validate_add_faculty($POST){
    if(!validate_first_name($POST) || !validate_last_name($POST) || !validate_username($POST) || !validate_email($POST) || !validate_department($POST)){
        return false;
     }
    return true;
}

?>