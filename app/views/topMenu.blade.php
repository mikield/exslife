<div class="row">
   
    <!-- Profile Info and Notifications -->
    <div class="col-md-6 col-sm-8 clearfix">
       <ul class="user-info pull-left pull-right-xs pull-none-xsm">
            
        </ul> 
       
        
    
    </div>
    
    
    <!-- Raw Links -->
    <div class="col-md-6 col-sm-4 clearfix hidden-xs">
        
        <ul class="list-inline links-list pull-right">
       <li class="dropdown language-selector">
                {{--*/ $lang = Session::get('lang') /*--}}
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-close-others="true">
                @if($lang == 'ru')
                    <img src="/assets/images/flag-ru.png">
                @elseif($lang == 'en')
                    <img src="/assets/images/flag-usa.png">
                @endif
                </a>
                
                <ul class="dropdown-menu pull-right">
                    <li>
                @if($lang == 'ru')
                    <a href="/lang/en">
                            <img src="/assets/images/flag-usa.png">
                            <span>English</span>
                        </a>
                @elseif($lang == 'en')
                    <a href="/lang/ru">
                            <img src="/assets/images/flag-ru.png">
                            <span>Русский</span>
                        </a>
                @endif
                        
                    </li>
                </ul>
                
            </li>

            <li>
                <a onclick="go(this, event);" href="/bonus">
                    {{ trans('titles.bonus')}}
                </a>
            </li>
            
            
            
            <li class="sep"></li>
            
            <li>
                <a onclick="go(this, event);" href="/fortuna">
                    {{ trans('titles.fortuna')}}
                </a>
            </li>
            
            
            
            <li class="sep"></li>
             <li>
                <a onclick="go(this, event);" href="/referals">
                    {{ trans('titles.referals')}}
                </a>
            </li>
            
            
            
            <li class="sep"></li>
             <li>
                <a onclick="go(this, event);" href="/statistic">
                   {{ trans('titles.statistic') }}
                </a>
            </li>
            
        </ul>
        
    </div>
    
</div>
<hr>
