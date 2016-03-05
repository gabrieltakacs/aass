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

    <script>
        $(document).ready(function() {

            $('form').submit(function(event) {
                var formData = {
                    'name'              : $('input[name=name]').val(),
                    'country_id'        : $('select[name=country_id]').val()
                };

                // console.log(JSON.stringify(formData, null, 2));

                $.ajax({
                            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                            url         : "{{ action('Controller@store') }}",
                            data        : formData, // our data object
                            dataType    : 'json', // what type of data do we expect back from the server
                            encode          : true
                        })
                        .done(function(data) {
                            console.log(data);
                        });

                event.preventDefault();
            });

        });
    </script>

@endsection