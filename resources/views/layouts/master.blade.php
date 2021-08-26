<!DOCTYPE html>
<html lang="en">
<head>
  <title>Estimate System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    
  </style>
</head>
<body>
<div id="app">
<nav class="navbar navbar-inverse" >
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Estimate System</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <!-- <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Page 1-1</a></li>
          <li><a href="#">Page 1-2</a></li>
          <li><a href="#">Page 1-3</a></li>
        </ul>
      </li>
      <li><a href="#">Page 2</a></li> -->
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> {{Auth::user()->name}} </a></li>
      <!-- <li><a href="{{route('logout')}}"><span class="glyphicon glyphicon-log-in" ></span> Logout </a></li> -->
    
                        <!-- Authentication -->
                       <li> 
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                             <button type="submit" class="btn btn-link btn-logout"><span class="glyphicon glyphicon-log-in" ></span> {{ __('Log Out') }}</button> 
                            
                            <!-- <a :href="route('logout')" onmouseover="" style="cursor: pointer;"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                <span class="glyphicon glyphicon-log-in" ></span> {{ __('Log Out') }}
                            </a> -->
                        </form>
                      </li>                  
    </ul>
    
  </div>
</nav>
  <!-- <app></app>  -->

     @yield('content')   

</div>
</body>
 <script src="{{mix('/js/app.js')}}"></script>
</html>
