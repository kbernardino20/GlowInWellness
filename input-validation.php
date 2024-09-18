<?php
    function input_check($string, $type){
        switch($type){
            case "text":
                return(!preg_match("/^[a-zA-Z-'\\\\ ]*$/", $string));
                break;
            case "title":
                return(!preg_match("/^[a-zA-Z0-9-':.?,\\\\ ]*$/", $string));
                break;
            case "email":
                return(!filter_var($string, FILTER_VALIDATE_EMAIL));
                break;
            case "password":
                return(!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $string));
                break;
                case "normal":
                    return (!preg_match("/^[a-zA-Z0-9 !@#$%^&*()@.]*$/", $string));
                    break;
            case "empno":
                    return (!preg_match("/^[0-9]+(\.[0-9]{1,2})?$/", $string));
                    break;
            case "date":
                $format = 'Y-m-d';
                $d = DateTime::createFromFormat($format, $string);
                return $d && $d->format($format) == $string;
                break;
            default:
                return FALSE;
                break;                                    
        }
    }
?>