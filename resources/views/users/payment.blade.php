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
      <span><h2><strong>Add Passenger Details and Payment Method</strong></h2></span>
      
    <form action="" method='post'>
        <div class='form-group'>
            {{csrf_field()}}
        </div>
        <div class='form-group clearfix'>
          <label for='fname' class='col-xs-2'>Seat Numbers:</label>
            <div class='col-xs-10 input-group'>
             <?php $store_seat=App\Store_seat::all();?>
            @foreach($store_seat as $store)
              <input type="text" name="seat" style="text-align: center" value={{$store->seat_no}}  size="4">&nbsp;&nbsp;<button type='button' class='btn btn-primary' data-toggle="modal" data-target="#addModal" onclick="onClickValue('{{$store->seat_no}}')">Add Passenger</button><br><br>
            @endforeach
            </div>
        </div>
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
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Passenger Details</h4>
      </div>
      <div class="modal-body">
       <form action='{{route("save_passenger")}}' method='post'>
          {{csrf_field()}}
          <div class='form-group'>
            <label for='title' class='col-xs-2'>Title</label>
              <div class='col-xs-10 input-group'>
                <select class='form-control' name='title' required>
                  <option disabled selected>Select title</option>
                  <option>Ms.</option>
                  <option>Mrs.</option>
                  <option>Mr.</option>
                </select>
              </div>
          </div>
          <div class='form-group'>
            <label for='full_name' class='col-xs-2'>Full Name</label>
                <div class='col-xs-10 input-group'>
                    <input type="text" name="full_name" class="form-control" placeholder="Enter Passenger full Name" required>
                </div>
          </div>
          <div class='form-group'>
            <label for='cid' class='col-xs-2'>CID</label>
                <div class='col-xs-10 input-group'>
                    <input type="text" name="cid" class="form-control" placeholder="Enter cid number">
                </div>
          </div>
            <div class='form-group'>
              <label for='gender' class='col-xs-2'>Gender</label>
                <div class='col-xs-10 input-group'>
                  <select class='form-control' name='gender' required>
                      <option disabled selected>Select gender</option>
                        <?php 
                          $gender=App\EnumGender::all();
                          foreach($gender as $genders):
                        ?>
                        <option value="{{$genders->id}}">{{$genders->gender}}</option>
                        <?php 
                          endforeach
                        ?>
                 </select>
                </div>
            </div>
            <input type="hidden" name="hidden_seat1" id='hidden_seat1'>
      <div class="modal-footer">
      <input type='hidden' name='hidden_seat' id='hidden_seat'>
          <button type="submit" class="btn btn-primary glyphicon glyphicon-ok" id='save'>Save</button>
          <button type="button" class="btn btn-warning glyphicon glyphicon-remove" data-dismiss="modal">Cancel</button>
      </div>
      </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  function onClickValue(id)
  {
    $('#hidden_seat1').val(id);
  }
</script>>
@endsection
