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
    </div>
</div>
<div class="modal fade" id="seatModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Choose your favorite seat</h4>
        <div>
          <div class="modal-body">
          <table border='0px' id="tab" border-spacing="4px"> 
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
            <tr><td><input type="checkbox"><img src="img/seat.png" alt="" border=3 height=30 width=30>1</td>
                <td></td>
                <td><img src="img/seat.png" alt="" border=3 height=30 width=30>2</td>
                <td><img src="img/seat.png" alt="" border=3 height=30 width=30>3</td>
            </tr>
            <br>
            <tr><td><img src="img/seat.png" alt="" border=3 height=30 width=30>4</td>
                <td></td>
                <td><img src="img/seat.png" alt="" border=3 height=30 width=30>5</td>
                <td><img src="img/seat.png" alt="" border=3 height=30 width=30>6</td>
            </tr>
            <tr><td><img src="img/seat.png" alt="" border=3 height=30 width=30>7</td>
                <td></td>
                <td><img src="img/seat.png" alt="" border=3 height=30 width=30>8</td>
                <td><img src="img/seat.png" alt="" border=3 height=30 width=30>9</td>
            </tr>
            <tr><td><img src="img/seat.png" alt="" border=3 height=30 width=30>10</td>
                <td></td>
                <td><img src="img/seat.png" alt="" border=3 height=30 width=30>11</td>
                <td><img src="img/seat.png" alt="" border=3 height=30 width=30>12</td>
            </tr>
            <tr><td><img src="img/seat.png" alt="" border=3 height=30 width=30>13</td>
                <td></td>
                <td><img src="img/seat.png" alt="" border=3 height=30 width=30>14</td>
                <td><img src="img/seat.png" alt="" border=3 height=30 width=30>15</td>
            </tr>
            <tr>
                <td><img src="img/seat.png" alt="" border=3 height=30 width=30>16</td>
                <td><img src="img/seat.png" alt="" border=3 height=30 width=30>17</td>
                <td><img src="img/seat.png" alt="" border=3 height=30 width=30>18</td>
                <td><img src="img/seat.png" alt="" border=3 height=30 width=30>19</td>
            </tr>
          </table>
        </div>
      </div>
       <div class="modal-footer">
          <button type="" class="btn btn-primary" id='save'>Ok</button>
      </div>
      </div>
    </div>
  </div>
</div>
@endsection
