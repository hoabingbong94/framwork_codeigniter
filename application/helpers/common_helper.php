<?php

function public_url($url = '') {
    return base_url('public/' . $url);
}

function admin_url($url = '') {
    return base_url('public/' . $url);
}

function url_admin($url = '') {
    return base_url('admin/' . $url);
}
function url_images($url = '') {
    return base_url('upload/' . $url);
}

function pre($flat) {
    echo "<pre>";
    print_r($flat);
    die();
}
