<?php
   

    function convert($currency, $ammount){
        if($currency == "USD"){
            $sign = "$";
            $curr_view = $ammount * 1.25;
        }
        else if($currency == "EUR"){
            $sign = "€";
            $curr_view = $ammount * 1.15;
        }
        else{
            $sign = "£";
            $curr_view = $ammount;
        }
        echo $sign."".$curr_view;

    }
    
    // DIFFER FROM RETURNING VALUE
    function converti($ammount){
        if($_SESSION['curr'] == "USD"){
            $sign = "$";
            $curr_view = $ammount * 1.25;
        }
        else if($_SESSION['curr'] == "EUR"){
            $sign = "€";
            $curr_view = $ammount * 1.15;
        }
        else{
            $sign = "£";
            $curr_view = $ammount;
        }
        return $sign."".$curr_view;

    }