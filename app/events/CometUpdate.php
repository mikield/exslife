<?php

class CometUpdate {
    
    public function handle($data)
    {
        $redis = Redis::connection();
        $redis->publish('userUpdate'.Auth::user()->id, $data);
    }
}