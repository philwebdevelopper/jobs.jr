@extends('layouts.app')

@section('content')
@php
if (isset($_POST['clientLat']) && isset($_POST['clientLon']))
{
	$lat = $_POST['clientLat'];
	$lon = $_POST['clientLon'];
}
@endphp
<div class="container">
	<div id="mapid"></div>
	<input type="hidden" id="lat" name="clientLat" value="<?php echo $lat ?>">
	<input type="hidden" id="lon" name="clientLon" value="<?php echo $lon ?>">
</div>
@endsection

@section('script')



@endsection
