<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/30
 * Time: 11:58
 */

/** 判断一个字符串是否是手机号 */
function str_is_mobile($str)
{
    return 0 !== preg_match('/^(?:\+?86)?[1][0-9]\d{9}$/', $str);
}

/** 判断一个字符串是否是手机号 */
function str_is_email($str)
{
    // 从 ci/system/helpers/email_helper.php 中提取
    return 0 !== preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str);
}

/** 判断一个字符串是否为 QQ */
function str_is_qq($str)
{
    return 0 !== preg_match('/^[1][0-9]\d{5,8}$/', $str);
}


/**
 * 判断一个字符串是否是空字符串
 *
 * @param mixed $input
 * @return bool 指示该字符串是否是空字符串
 */
function empty_str($input)
{
    return empty($input) || 0 == strcasecmp('null', $input);
}

function post_param($key = null, $defaultValue = false)
{
    if(isset($_POST[$key])) {
        return $_POST[$key];
    }
    else {
        foreach($_POST as $k => $v) {
            if(0 === strcasecmp($k, $key)) return $v;
        }
    }
    return $defaultValue;
}

function request_param($key = null, $defaultValue = false)
{
    if(isset($_GET[$key])) {
        return $_GET[$key];
    }
    else {
        foreach($_GET as $k => $v) {
            if(0 === strcasecmp($k, $key)) return $v;
        }
    }

    return post_param($key, $defaultValue);
}
