@extends('frontEnd.template')
@section('content')
<section class="slider-container" style="background-image: url(./assets/frontend/images/slide-img-1-bg.png);">
  
  <div class="container">
    
    <div class="row">
      
      <div class="col-md-12">
        
        <div class="slides">
          
                    <div class="slide active">
          
            <div class="slide-content">
              <h2>
                <small>exSLife</small>
               {{ trans('indexPage.slide1Title') }}
              </h2>
              
              <p>
                {{ trans('indexPage.slide1Text') }}
              </p>
            </div>
            
            <div class="slide-image">
              
              
                <img src="/assets/frontend/images/slide-img-1.png" class="img-responsive">
              
            </div>
            
          </div>
          
                    <div class="slide" data-bg="./assets/frontend/images/slide-img-1-bg.png">
            
            <div class="slide-image">
              
             
                <img src="/assets/frontend/images/slide-img-2.png" class="img-responsive">
              
            </div>
          
            <div class="slide-content text-right">
              <h2>
                <small>exSLife</small>
                {{ trans('indexPage.slide2Title') }}
              </h2>
              
              <p>
                {{ trans('indexPage.slide2Text') }}
              </p>
              
            </div>
            
          </div>
          
                    <div class="slide">
          
            <div class="slide-content">
              <h2>
                <small>exSLife</small>
                {{ trans('indexPage.slide3Title') }}
              </h2>
              
              <p>
                {{ trans('indexPage.slide3Text') }}
              </p>
            </div>
            
            <div class="slide-image">
              
              
                <img src="/assets/frontend/images/slide-img-3.png" class="img-responsive">
             
            </div>
            
          </div>
          
                    <div class="slides-nextprev-nav">
            <a href="#" class="prev">
              <i class="entypo-left-open-mini"></i>
            </a>
            <a href="#" class="next">
              <i class="entypo-right-open-mini"></i>
            </a>
          </div>
        </div>
        
      </div>
      
    </div>
    
  </div>
  
</section>


<section class="features-blocks">
  
  <div class="container">
    
    <div class="row vspace">      
      <div class="col-sm-4">
        
        <div class="feature-block">
          <h3>
            <i class="entypo-cog"></i>
            {{ trans('indexPage.blok1Title')}}
          </h3>
          
          <p>
            {{ trans('indexPage.blok1Text')}}
          </p>
        </div>
        
      </div>
      
      <div class="col-sm-4">
        
        <div class="feature-block">
          <h3>
            <i class="entypo-gauge"></i>
           {{ trans('indexPage.blok2Title')}}
          </h3>
          
          <p>
            {{ trans('indexPage.blok2Text')}}
          </p>
        </div>
        
      </div>
      
      <div class="col-sm-4">
        
        <div class="feature-block">
          <h3>
            <i class="entypo-lifebuoy"></i>
            {{ trans('indexPage.blok3Title')}}
          </h3>
          
          <p>
           {{ trans('indexPage.blok3Text')}}
          </p>
        </div>
        
      </div>
      
    </div>
    
  </div>
  
</section>
<div class="container">
  <div class="row vspace">
    <div class="col-md-12">
      
      <div class="callout-action">
        <h2>{{ trans('indexPage.joinText') }}</h2>
        
        <div class="callout-button">
        <center>
          <a href="{{ url('/login')}}" class="btn btn-secondary">{{ trans('messages.login') }}</a><br />
          или
          <a href="{{ url('/signup')}}" class="btn btn-success">{{ trans('messages.signup') }}</a>
        </center>
        </div>
      </div>
      
    </div>
  </div>
</div>
<section class="footer-widgets">
  
  <div class="container">
    
    <div class="row">
      
      <div class="col-sm-6">
        
         <section class="site-logo" style="
    font-size: 30px;
    font-weight: bolder;
">
        
          <a href="/">
           exSLife
          </a>
          
        </section>
        
        <p>
          {{ trans('indexPage.bottomText') }}
        </p>
        
      </div>
      
      <div class="col-sm-3">
        
        <!-- empty -->
      </div>
      
      <div class="col-sm-3">
        
        <h5>{{ trans('indexPage.contacts') }}</h5>
        
        <p>
          Vk: <a href='http://vk.com/mr.mikield' target='_blank'>Владислав Гайсюк</a><br>
          Skype: <a href='callTo://mikield' target='_blank'>mikield</a><br>
          <a href='mailto:support@exslife.com' target='_blank'>support@exslife.com</a>
        </p>
        
      </div>
      
    </div>
    
  </div>
  
</section>

<footer class="site-footer navbar navbar-inner  navbar-fixed-bottom">
  <div class="container">
  
    <div class="row">
      
      <div class="col-sm-6">
        exSlife © 2014
      </div>
      
      <div class="col-sm-6">
        
        <ul class="social-networks text-right">
          <li>
            <a href="{{ url('http://vk.com/codemax_tm')}}" target="_blank">
              <i class="entypo-vkontakte"></i>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="entypo-twitter"></i>
            </a>
          </li>
        </ul>
        
      </div>
      
    </div>
    
  </div>

</footer>

@stop