@extends('layouts.app')
@section('content')
<div id="parent">
    <div id="sidebar">
        <ul class="nav nav-pills nav-stacked">
           <ul class="nav nav-pills nav-stacked">
           {{--  <li role="presentation"><a href="#">My Profile</a></li>
            <li role="presentation"><a href="{{ url('/home/schedule') }}">Schedule</a></li>
            <li role="presentation"><a href="{{ url('/home/journey') }}">Journey Information</a></li>
            <li role="presentation"><a href="{{ url('/home/bus') }}">Bus Information</a></li> --}}
            <li role="presentation"><a href="#{{-- url('/home/reservation') --}}">Reservation</a></li>  
        </ul>       
    </div>
    <div id="main-content">
    <form action="{{route('getSeatInfo')}}" method="post">
       <div class='form-group'>
          {{csrf_field()}}
        </div>
        <h1>Reservation Panel</h1>
        <?php $user=App\User::where('id',Session::get('user_id'))->first(); 
        ?>
            <div class='form-group'>
              <label for='bus' class='col-xs-2'>Bus:</label>
                <div class='col-xs-8 input-group'>
                  <input type="text" name="bus" value="{{$bus->Bus_name}}" disabled>
                </div>
            </div>
           <div class='form-group'>
              <label for='user' class='col-xs-2'>User:</label>
                <div class='col-xs-8 input-group'>
                  <input type="text" name="user" value="{{$user->fname.' '.$user->lname}}" disabled>
                </div>
            </div>
            <div class='form-group'>
              <label for='available_seat' class='col-xs-2'>No.of seats available:</label>
                <div class='col-xs-8 input-group'>
                  <input type="text" name="available_seat" value="{{$bus->No_of_seat.'seats'}}" disabled>&nbsp;&nbsp;
                  <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#seatModal' id='view'>View</button>
                </div>
            </div>
            <div class='form-group clearfix'>
              <label for='booked_seat' class='col-xs-2'>Booked Seat Number:</label>
                <?php $store_seat=App\Store_seat::all();
                  $count=0;
                  ?>
                  <div class='col-xs-8 input-group'>
                  @foreach($store_seat as $store)
                   {{$store->seat_no}},
                    <?php $count++;?>
                  @endforeach
                </div>
            </div>
             <div class='form-group'>
              <label for='fare' class='col-xs-2'>Fare Per Head:</label>
                <div class='col-xs-8 input-group'>
                  <input type="text" name="fare"  value="Nu.{{$bus->price}}" disabled>
                </div>
            </div>
            <div class='form-group'>
              <label for='total_fare' class='col-xs-2'>Total Fare:</label>
                <div class='col-xs-8 input-group'>
                  <input type="text" name="total_fare" value="Nu.{{$bus->price*$count}}">
                </div>
            </div>
            <div class='form-group'>
             <div class='col-xs-10 col-xs-offset-3 input-group'>
               <input class='btn btn-success' type='button' value='Next'<?php if($count==0){?>disabled <?php }?> data-toggle='modal' data-target="#addPassenger" onclick='passTotalFare("{{$bus->price*$count}}")'/>

             </div> 
            </div>
        </form>
    </div>
</div>
<div class="modal fade" id="seatModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Choose your favorite seat</h4>
        </div>
        <div>
        <form action='{{route('select_seat')}}' method='post'>
           {{csrf_field()}}
           <input type="hidden" name="hidden_bus" id='hidden_bus' value={{Session::get('bus_no')}}>
          <div class="modal-body">
          <table border='0px' id="tab" border-spacing="4px" align='center'> 
          <col width="60">
          <col width="80">
          <col width="60">
          <col width="60">

          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td colspan="4"><img src="img/diver.png" alt="" border=3 height=30 width=30>Diver</td>
          </tr>
            <tr><td><input type="checkbox" value=1 name='val1' id='val1'><img src="img/seat.png" alt="" border=3 height=30 width=30></td>
                <td></td>
                <td><input type="checkbox" value=2 name='val2' id='val2'><img src="img/seat.png" alt="" border=3 height=30 width=30></td>
                <td><input type="checkbox" value=3 name='val3' id='val3'><img src="img/seat.png" alt="" border=3 height=30 width=30></td>
            </tr>
            <br>
            <tr><td><input type="checkbox" value=4 name='val4' id='val4'><img src="img/seat.png" alt="" border=3 height=30 width=30></td>
                <td></td>
                <td><input type="checkbox" value=5 name='val5' id='val5'><img src="img/seat.png" alt="" border=3 height=30 width=30></td>
                <td><input type="checkbox" value=6 name='val6' id='val6' ><img src="img/seat.png" alt="" border=3 height=30 width=30></td>
            </tr>
            <tr><td><input type="checkbox" value=7 name='val7' id='val7'><img src="img/seat.png" alt="" border=3 height=30 width=30></td>
                <td></td>
                <td><input type="checkbox" value=8 name='val8' id='val8'><img src="img/seat.png" alt="" border=3 height=30 width=30></td>
                <td><input type="checkbox" value=9 name='val9' id='val9'><img src="img/seat.png" alt="" border=3 height=30 width=30></td>
            </tr>
            <tr><td><input type="checkbox" value=10 name='val10' id='val10'><img src="img/seat.png" alt="" border=3 height=30 width=30></td>
                <td></td>
                <td><input type="checkbox" value=11 name='val11' id='val11'><img src="img/seat.png" alt="" border=3 height=30 width=30></td>
                <td><input type="checkbox" value=12 name='val12' id='val12'><img src="img/seat.png" alt="" border=3 height=30 width=30></td>
            </tr>
            <tr><td><input type="checkbox" value=13 name='val13' id='val13'><img src="img/seat.png" alt="" border=3 height=30 width=30></td>
                <td></td>
                <td><input type="checkbox" value=14 name='val14' id='val14'><img src="img/seat.png" alt="" border=3 height=30 width=30></td>
                <td><input type="checkbox" value=15 name='val15' id='val15'><img src="img/seat.png" alt="" border=3 height=30 width=30></td>
            </tr>
            <tr>
                <td><input type="checkbox" value=16 name='val16' id='val16'><img src="img/seat.png" alt="" border=3 height=30 width=30></td>
                <td><input type="checkbox" value=17 name='val17' id='val17'><img src="img/seat.png" alt="" border=3 height=30 width=30></td>
                <td><input type="checkbox" value=18 name='val18' id='val18'><img src="img/seat.png" alt="" border=3 height=30 width=30></td>
                <td><input type="checkbox" value=19 name='val19' id='val19'><img src="img/seat.png" alt="" border=3 height=30 width=30></td>
            </tr>
          </table>
       
      </div>
       <div class="modal-footer">
          <button type="submit" class="btn btn-primary" id='save'>Ok</button>
          <button class="btn btn-default" data-dismiss="modal" >Cancel</button>
      </div>
       </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="addPassenger" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Passenger Details</h4>
        </div>
         <div class="modal-body">
          <div class='form-group clearfix'>
          <label for='fname' class='col-xs-2'>Seat Numbers:</label>
            <div class='col-xs-10 input-group'>
             <?php $store_seat=App\Store_seat::all();?>
            @foreach($store_seat as $store)
              <input type="text" name="seat" style="text-align: center" value={{$store->seat_no}}  size="4">&nbsp;&nbsp;<button type='button' class='btn btn-primary' data-toggle="modal" data-target="#addModal" onclick="onClickValue('{{$store->seat_no}}')">Add Passenger</button><br><br>
            @endforeach
            </div>
        </div>
         </div>
        <div>
        </div>
      </div>
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
  var url='{{route('seat_info')}}';
  var id=$('#hidden_bus').val();
  $.ajax({
        url: url,
        type:"GET", 
        data: {"id":id}, 
        success: function(result){
          $.each(result,function(key,val)
          {
            if(val.status==1 && val.seat_id==$('#val1').val())
            {
              $('#val1').hide();
            }
            if(val.status==1 && val.seat_id==$('#val2').val())
            {
              $('#val2').hide();
            }
            if(val.status==1 && val.seat_id==$('#val3').val())
            {
              $('#val3').hide();
            }
            if(val.status==1 && val.seat_id==$('#val4').val())
            {
              $('#val4').hide();
            }
            if(val.status==1 && val.seat_id==$('#val5').val())
            {
              $('#val5').hide();
            }
            if(val.status==1 && val.seat_id==$('#val6').val())
            {
              $('#val6').hide();
            }
            if(val.status==1 && val.seat_id==$('#val7').val())
            {
              $('#val7').hide();
            }
            if(val.status==1 && val.seat_id==$('#val8').val())
            {
              $('#val8').hide();
            }
            if(val.status==1 && val.seat_id==$('#val9').val())
            {
              $('#val9').hide();
            }
            if(val.status==1 && val.seat_id==$('#val10').val())
            {
              $('#val10').hide();
            }
            if(val.status==1 && val.seat_id==$('#val11').val())
            {
              $('#val11').hide();
            }
            if(val.status==1 && val.seat_id==$('#val12').val())
            {
              $('#val12').hide();
            }
            if(val.status==1 && val.seat_id==$('#val13').val())
            {
              $('#val13').hide();
            }
            if(val.status==1 && val.seat_id==$('#val14').val())
            {
              $('#val14').hide();
            }
            if(val.status==1 && val.seat_id==$('#val15').val())
            {
              $('#val15').hide();
            }
            if(val.status==1 && val.seat_id==$('#val16').val())
            {
              $('#val16').hide();
            }
            if(val.status==1 && val.seat_id==$('#val17').val())
            {
              $('#val17').hide();
            }
            if(val.status==1 && val.seat_id==$('#val18').val())
            {
              $('#val18').hide();
            }
            if(val.status==1 && val.seat_id==$('#val19').val())
            {
              $('#val19').hide();
            }
          });
        }
      });
  function onClickValue(id)
  {
    $('#hidden_seat1').val(id);
  }

  function passTotalFare(id)
  {
    var url='{{route('getSeatInfo')}}';
    $.ajax({
        url: url,
        type:"GET", 
        data: {"id":id}, 
        success: function(result){
          console.log(result);
        }
      });
  }
</script>
@endsection
