@extends('layouts.app')

@section('content')
    <form method="POST" action="/testpost">
        @csrf
        Votre adresse email:<br>
        <input type="text" name="firstname">
        <button type="submit" class="btn btn-primary">
            Soumettre
        </button>
    </form>
@endsection