@extends('layout')
@section('content')
<div class="container">
  <h2 style="margin-bottom:1em;">My Tasks</h2>
       @include('tasks.partials._table', ['empty_message'=>'You have no assigned tasks'])
</div>
@endsection
  