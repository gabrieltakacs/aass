@extends('layouts.master')

@section('content')

    <form method="post" action="{{ action('Controller@store') }}">

        <select name="country_id">

            @foreach ($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->name }}</option>
            @endforeach

        </select>

        <br>
        Town name:<br>
        <input type="text" name="name" placeholder="town name">

        <br>

        <input type="submit" value="Submit">
    </form>



@endsection