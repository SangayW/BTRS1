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
      <span><strong>Passenger Details</strong></span>
    <form action="" method='post'>
                    <div class='form-group'>
                        {{csrf_field()}}
                    </div>
                  <div class='form-group clearfix'>
                  <label for='' class='col-xs-2'>Title</label>
                    <div class='col-xs-10 input-group'>
                      <select class='' name='' required>
                        <option>Slect</option>
                        <option>Ms.</option>
                        <option>Mrs.</option>
                        <option>Mr.</option>
                      </select>
                    </div>
                </div>
                <div class='form-group'>
                  <label for='fname' class='col-xs-2'>First Name</label>
                    <div class='col-xs-10 input-group'>
                      <input type="text" name="fname" class="" placeholder="Enter Name here" required>
                    </div>
                </div>
                <div class='form-group'>
                  <label for='mname' class='col-xs-2'>Mobile No</label>
                    <div class='col-xs-8 input-group'>
                      <input type="text" name="mname" class="" placeholder="Enter number here" required>
                    </div>
                </div>
                <div class='form-group'>
                  <label for='lname' class='col-xs-2'>Email</label>
                    <div class='col-xs-8 input-group'>
                      <input type="email" name="lname" class="" placeholder="Enter email here">
                    </div>
                </div>
                <div class='form-group'>
                  <label for='lname' class='col-xs-2'>Adderss</label>
                    <div class='col-xs-8 input-group'>
                      <input type="text" name="lname" class="" placeholder="Enter address here">
                    </div>
                </div>
                <div class='form-group'>
                  <label for='lname' class='col-xs-2'>Gross Amount</label>
                    <div class='col-xs-8 input-group'>
                      <input type="text" name="lname" class="" placeholder="Enter here" value="{{Session::get('price')}}" disabled>
                    </div>
                </div>
                <div class='form-group'>
                  <label for='lname' class='col-xs-2'>Payment Mode:</label>
                    <div class='col-xs-8 input-group'>
                      <select class='' name='' required>
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
