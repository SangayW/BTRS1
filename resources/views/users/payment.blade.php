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
    <form action="" method="get" id='form1'>
        {{csrf_field()}}
        <div class='form-group'>
          <label for='gross_amount' class='col-xs-2'>Gross Amount</label>
            <div class='col-xs-8 input-group'>
              <input type="text" name="lname" class="" placeholder="Enter here" value="{{Session::get('total_fare')}}" disabled>
            </div>
        </div>
        <div class='form-group'>
          <label for='payment_mode' class='col-xs-2'>Payment Mode:</label>
            <div class='col-xs-8 input-group'>
              <select name='payment_mode' required>
                <option>VISA Card</option>
              </select>
            </div>
        </div>
          <div class='form-group'>
          <label for='visa_number' class='col-xs-2'>VISA Number:</label>
            <div class='col-xs-8 input-group'>
             <input type="text" placeholder="enter visa number" name='visa_number'>
            </div>
        </div>
        <div><h3>Payment is not refundable once ticket is issued!!!</h3></div>
        <div class='form-group'>
          <label for='lname' class='col-xs-2'>Yes i accept:</label>
            <div class='col-xs-8 input-group'>
             <input type="radio" required>
            </div>
        </div>

            <div class="form-group">
                <div class="col-xs-4 col-xs-offset-1 input-group">
                    <button type="submit" class="btn btn-primary col-xs-2 col-xs-offset-4">Pay</button>
                </div>
            </div>
        </form> 
</div>
</div>
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content modal-lg">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Reservation Confirmation</h4>
        </div>
         <div class="modal-body">
          <div class="alert alert-success">
                {{'Payment is done successfully'}}
          </div>
         <table class="table table-bordered table-striped table-responsive" id="table1" style="align:center">
          <thead >
            <tr>
              <th>Sl_no:</th>
              <th>Bus No.</th>
              <th>Bus Name</th>
              <th>Seat_booked</th> 
              <th>Date</th>
              <th>Journey</th>
              <th>Reporting Time</th>
              <th>Departure Time</th>            
            </tr> 
          </thead>           
          <tbody>
            <tr>
              <td>1</td>
              <td>{{Session::get('bus_no')}}</td>
              <td>
                <?php $bus=App\Bus::where('Bus_no',Session::get('bus_no'))->first();?>
                {{$bus->Bus_name}}
              </td>
              <td>
                <?php $seat_booked=App\Store_seat::all();?>
                @foreach($seat_booked as $seat)
                  {{$seat->seat_no}},
                @endforeach
              </td>
              <td>{{Session::get('date')}}</td>
              <td>{{Session::get('source').' '.'to'.' '.Session::get('destination')}}</td>
              <?php $bus=App\Bus::where('Bus_no',Session::get('bus_no'))->first();?>
              <td>{{$bus->schedule->Reporting_time}}</td>
              <td>{{$bus->schedule->Departure_time}}</td>
            </tr>
          </tbody>
          </table>
           <div class="modal-footer">
           <form action='{{route('store_reservation')}}' method='post'>
            {{csrf_field()}}
            <button type="submit" class="btn btn-primary glyphicon glyphicon-ok" id='save'>Finish</button>
            </form>
      </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $('#form1').on('submit',function(e){
    e.preventDefault();
    $('#confirmModal').modal('show');
  });
</script>>
@endsection
