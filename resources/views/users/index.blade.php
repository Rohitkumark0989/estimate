@extends('layouts.master')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">

<div class="container">

  <div class="row col-sm-6 justify-content-center">
   @if(Session::has('success'))
        <div class="alert alert-success center" >
            {{ Session::get('success') }}
        </div>
    @endif

  <h3>Welcome to Question Panel</h3>

  <form method="POST" action="/user/answers">
  @csrf
  @if($questions)
    @foreach($questions as $q)
        <input type="hidden" name="questions[]" value="{{$q->questions}}">
        <div class="form-group">
            <label for="exampleInputEmail1">{{$q->questions}}</label>
            <input type="text" class=" form-control form-control-lg" name="answer[]" required aria-describedby="emailHelp" placeholder="Enter Answer">
        </div>
    @endforeach

  @endif
   <div class="form-group">
       <div class="input-group" id="datetimepicker">
                <input type="text" name="datetime" class=" form-control form-control-lg" required  placeholder="Please Pick Date & Time">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span> 
                </span>
       </div>
   </div>

  
  <button type="submit" class="btn btn-primary col-sm-12">Submit</button>
</form>
</div> 
</div>

@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js" defer></script>

<script type="text/javascript">
    $(function(){
        $('#datetimepicker').datetimepicker();
    })
</script>    