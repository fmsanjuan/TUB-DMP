@extends('layouts.base')

@section('navigation')
   TABS
@stop


<ul class="nav">
    <li><a href="{{{ URL::to('') }}}">Home</a></li>
    <li><a href="{{{ URL::to('plan') }}}">Plan</a></li>

</ul>