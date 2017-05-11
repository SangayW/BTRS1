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
        <h1>Reservation Panel</h1>
        <?php $user=App\User::where('id',Session::get('user_id'))->first(); 
        ?>
           <span><strong>Bus:{{$bus->Bus_name}}</strong>
           <br>
           <span><strong>User:{{$user->fname.' '.$user->lname}}</strong>
           <br>
           <span><strong>No.of seats available:{{$bus->No_of_seat.'seats'}}</strong></span>
           <button class='btn btn-primary' data-toggle='modal' data-target='#seatModal'>View</button>
           <br>
           <span><strong>No_of_seat_booked:</strong>{{Session::get('count')}}</span>
           <br>
           <span><strong>Fare/person:</strong>Nu.{{$bus->price}}</span>
           <br>
           <span><strong>Total Fare:</strong>Nu.{{$bus->price*Session::get('count')}}</span>
           <br>
           &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;<button class='btn btn-success'>Payment</button>

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
            else if(val.status==1 && val.seat_id==$('#val2').val())
            {
              $('#val2').hide();
            }
            else if(val.status==1 && val.seat_id==$('#val3').val())
            {
              $('#val3').hide();
            }
            else if(val.status==1 && val.seat_id==$('#val4').val())
            {
              $('#val4').hide();
            }
            else if(val.status==1 && val.seat_id==$('#val5').val())
            {
              $('#val5').hide();
            }
            else if(val.status==1 && val.seat_id==$('#val6').val())
            {
              $('#val6').hide();
            }
            else if(val.status==1 && val.seat_id==$('#val7').val())
            {
              $('#val7').hide();
            }
            else if(val.status==1 && val.seat_id==$('#val8').val())
            {
              $('#val8').hide();
            }
            else if(val.status==1 && val.seat_id==$('#val9').val())
            {
              $('#val9').hide();
            }
            else if(val.status==1 && val.seat_id==$('#val10').val())
            {
              $('#val10').hide();
            }
            else if(val.status==1 && val.seat_id==$('#val11').val())
            {
              $('#val11').hide();
            }
            else if(val.status==1 && val.seat_id==$('#val12').val())
            {
              $('#val12').hide();
            }
            else if(val.status==1 && val.seat_id==$('#val13').val())
            {
              $('#val13').hide();
            }
            else if(val.status==1 && val.seat_id==$('#val14').val())
            {
              $('#val14').hide();
            }
            else if(val.status==1 && val.seat_id==$('#val15').val())
            {
              $('#val15').hide();
            }
            else if(val.status==1 && val.seat_id==$('#val16').val())
            {
              $('#val16').hide();
            }
            else if(val.status==1 && val.seat_id==$('#val17').val())
            {
              $('#val17').hide();
            }
            else if(val.status==1 && val.seat_id==$('#val18').val())
            {
              $('#val18').hide();
            }
            else if(val.status==1 && val.seat_id==$('#val19').val())
            {
              $('#val19').hide();
            }
            else
            {

            }
          });
        }
      });
</script>>
@endsection
