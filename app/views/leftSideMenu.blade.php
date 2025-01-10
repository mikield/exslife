 <header class="logo-env">
        
        
        <div class="logo">
            <a href="/" onclick="go(this, event);" style="font-size: 40px;font-weight: bolder;color: white;margin-top: -15px;">exSLife</a>
        </div>
        
               
                <div class="sidebar-collapse">
            <a href="#" class="sidebar-collapse-icon with-animation">
                <i class="entypo-menu"></i>
            </a>
        </div>
                        
        
        
        <div class="sidebar-mobile-menu visible-xs">
            <a href="#" class="with-animation">
                <i class="entypo-menu"></i>
            </a>
        </div>
        
    </header>



    <div class="sidebar-user-info">
    <? $userInfo = Auth::user(); ?>
            
            <div class="sui-normal">
    <a href="/top"  onclick="go(this, event);" data-toggle="tooltip" data-placement="right" class="badge badge-secondary" data-original-title="{{ trans('static.yourRate'); }}" style="margin-left: 43px;margin-top: -13px;cursor:pointer;position: absolute;">
        <i id='rate'>{{ Auth::user()->rate }}</i>
    </a>
                <a href="javascript:;" class="user-link" style='font-size: 14px;'>
                    <img src="{{ Auth::user()->ava }}" alt="" class="img-circle" style="margin-top: -10px;height:70px;">
                    
                    <span><?php

                     $str = Auth::user()->lastName;
            $str = iconv ("utf-8","windows-1251",$str);
            $per_s = $str[0];
            $per_s = iconv("windows-1251", "utf-8",$per_s);
            $l_name = $per_s.'.';
            echo Auth::user()->firstName.' '.$l_name;?></span>
                    <strong style='font-size: 14px;'><b id='money'><?= (Auth::user()->noLimit) ? 'безлимит</b>' : Auth::user()->balanse.'</b> '.trans_choice('static.money', Auth::user()->balanse);?></strong>
                </a>
            </div>
            
            <div class="sui-hover inline-links animate-in">             
             
                <a href="/logout">
                    <i class="entypo-lock"></i>
                    {{ trans('messages.logout') }}
                </a>
                <span class="close-sui-popup">×</span>          </div>
        </div>