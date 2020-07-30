<?php

function base_url(){
    echo("http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']);
}