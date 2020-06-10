@extends('layouts.app')

<div class="container">
  <div class="row">
    <div class="col-sm">

       @section('content')

      <h1> Våra aktiviteter </h1>

        @foreach ( $activities as $row)
          <tr>
            <td> {{$row['activity']}} </td><br>
          </tr>
        @endforeach
      @endsection
      
    </div>
  </div>
</div>