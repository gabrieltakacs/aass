@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-xs-5">
            <form method="post" action="{{ action('Controller@store') }}">
                <fieldset>
                    <legend>Add city</legend>

                    <div class="form-section">
                        <label for="country_select">Country:</label>
                        <select name="country_id" id="country_select" class="form-control">
                            @foreach ($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-section">
                        <label for="city_name">City:</label>
                        <input type="text" name="name" placeholder="City name" id="city_name" class="form-control">
                    </div>

                    <div class="form-section">
                        <input type="submit" value="Save" class="btn btn-primary">
                    </div>
                </fieldset>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('form').submit(function(event) {
                var formData = {
                    'name'              : $('input[name=name]').val(),
                    'country_id'        : $('select[name=country_id]').val()
                };

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