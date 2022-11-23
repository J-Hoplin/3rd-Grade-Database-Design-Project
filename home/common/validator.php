<?php


class Validator
{
    /**
     * @param $email
     * @return mixed
     */
    public static function emailvalidator($email){
        return filter_var($email,FILTER_VALIDATE_EMAIL);
    }

    /**
     * @param $username
     * @return bool
     */
    public static function usernamevalidator($username){
        // username pattern validation
        // 8~20글자 사이 길이, 영어 대소문자 및 숫자로만 이루어져있어야함
        return preg_match("/^[a-zA-Z0-9]{5,20}$/",$username);
    }

    /**
     * @param $password
     * @return false|int
     */
    public static function passwordvalidator($password){
        // userpassword pattern validation
        // 최소 6글자, 최소 하나의 영어문자, 숫자, 특수기호
        return preg_match("/^(?=.*[A-Za-z])(?=.*[0-9])(?=.*[$@$!%*#?&])[A-Za-z0-9$@$!%*#?&]{6,}$/",$password);
    }
}

?>