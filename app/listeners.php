<?php
if(Auth::check()){
    Event::listen('userUpdate'.Auth::user()->id, 'CometUpdate');
}