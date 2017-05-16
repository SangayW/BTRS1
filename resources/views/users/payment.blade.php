@extends('layouts.app')
@section('content')
<div id="parent">
    <div id="sidebar">
        <ul class="nav nav-pills nav-stacked">
          
            <li role="presentation"><a href="#{{-- url('/home/reservation') --}}">Payment</a></li>  
        </ul>  
         <div><img src="{{URL::asset('/img/visa.jpg')}}" alt="profile Pic" height="100" width="150"></img></div>     
    </div>

    <div id="main-content">
        <div class='form-group'>
          <label for='lname' class='col-xs-2'>Gross Amount</label>
            <div class='col-xs-8 input-group'>
              <input type="text" name="lname" class="" placeholder="Enter here" value="{{Session::get('total_fare')}}" disabled>
            </div>
        </div>
        <div class='form-group'>
          <label for='lname' class='col-xs-2'>Payment Mode:</label>
            <div class='col-xs-8 input-group'>
              <select name='' required>
                <option>VISA Card</option>
              </select>
            </div>
        </div>
          <div class='form-group'>
          <label for='lname' class='col-xs-2'>VISA Number:</label>
            <div class='col-xs-8 input-group'>
             <input type="text" placeholder="enter visa number">
            </div>
        </div>
        <div><h3>Payment is not refundable once ticket is issued!!!</h3></div>
        <div class='form-group'>
          <label for='lname' class='col-xs-2'>Yes i accept:</label>
            <div class='col-xs-8 input-group'>
             <input type="radio">
            </div>
        </div>

            <div class="form-group">
                <div class="col-xs-4 col-xs-offset-1 input-group">

                    <input type="submit" class="btn btn-primary col-xs-2 col-xs-offset-4" value="Pay" id='Pay'>
                </div>
            </div>
        </form> 
</div>
</div>
@endsection
