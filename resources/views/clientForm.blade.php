@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Quel est votre demande ?</h1>
  <form id="clientForm" action="{{url('map')}}">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" placeholder="email@email.com">
    </div>
    <div class="form-group col-md-6">
      <label for="phone">Phone Number</label>
      <input type="tel" class="form-control" id="phone" placeholder="(123)-456-7890">
    </div>
  </div>
  <div class="form-group">
    <label for="address">Address</label>
    <input type="text" class="form-control" id="address" placeholder="1234 Main St">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="city">City</label>
      <input type="text" class="form-control" id="city">
    </div>
    <div class="form-group col-md-2">
      <label for="zipCode">Zip Code</label>
      <input type="text" class="form-control" id="zipCode">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group">
      <label for="typeService">Type de service</label>
      <select id="typeService" class="form-control">
        <option selected>Choose...</option>
        <option>Peinture</option>
        <option>Déneigement</option>
        <option>Gardiennage</option>
        <option>Entretien Paysager</option>
      </select>
    </div>
    <div class="form-group col-md-6">
      <label for="dateService">Date du service</label>
      <input type="date" class="form-control" id="dateService">
    </div>
</div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection
