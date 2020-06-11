@extends('layouts.app')


@section('content')

<div class="container">
  <div class="jumbotron">
    <h1>Välkommen till IK Svalan </h1>
    <p> Glädje, Gemenskap, Utveckling, Trygghet - För alla</p>
  </div>
</div>


<div class="container">
  <div class="row">
    <div class="col">
     

      <h1> Aktiviteter </h1>
        @foreach ( $activities as $row)
          <tr>
            <td> {{$row['activity']}} </td><br>
          </tr>
        @endforeach
     </div>
    <div class="col">
      <h1> Lag </h1>
      
      @foreach ( $teams as $row) 
          <tr>
            <td> {{$row['teamName']}} </td>
          </tr><br>  
        @endforeach
    </div>
  </div>


      @endsection
 
</div>