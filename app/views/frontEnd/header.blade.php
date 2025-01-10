
<div class="site-header-container container">

  <div class="row">
  
    <div class="col-md-12">
      
      <header class="site-header">
      
       <section class="site-logo" style="
    font-size: 30px;
    font-weight: bolder;
">
        
          <a href="/">
           exSLife
          </a>
          
        </section>
        
        <nav class="site-nav">
          
          <ul class="main-menu hidden-xs" id="main-menu">
            <li class="active">
              <a href="{{ url('/'); }}">
                <span>{{ trans('indexPage.main') }}</span>
              </a>
            </li>
            <li>
              <a href="{{ url('/about'); }}">
                <span>{{ trans('indexPage.about') }}</span>
              </a>
            </li>
            <li>
              <a href="{{ url('/dev'); }}">
                <span>{{ trans('indexPage.dev') }}</span>
              </a>
            </li>
            <li>
              <a href="{{ url('/contacts'); }}">
                <span>{{ trans('indexPage.contacts') }}</span>
              </a>
            </li>
          </ul>
          
        
          <div class="visible-xs">
            
            <a href="#" class="menu-trigger">
              <i class="entypo-menu"></i>
            </a>
            
          </div>
        </nav>
        
      </header>
      
    </div>
    
  </div>
  
</div>
<style type="text/css">
  .btn-primary:hover {
    opacity: 0.8!important;
  }
</style>
 {{--*/ $lang = Session::get('lang') /*--}}
<div id="langBlock" style="">
<a href="/lang/en" class="btn @if($lang == 'en') btn-primary @endif" style="opacity: 0.3;">English</a>
<a href="/lang/ru" class="btn @if($lang == 'ru') btn-primary @endif" style="opacity: 0.3;">Русский</a>

</div>