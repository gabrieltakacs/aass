@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-xs-5">
            <form method="post" action="{{ action('Controller@store') }}">
                <fieldset>
                    <legend>Add city</legend>

                    <div class="form-section">
                        <label for="country_select">Country:</label>
                        <select name="country_id" id="country_select" class="form-control" onchange="loadCities()">
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

        <div class="col-xs-5 col-xs-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Vybrana krajina</div>

                <ul class="list-group" id="country_list">
                    <li class="list-group-item">Cras justo odio</li>
                    <li class="list-group-item">Dapibus ac facilisis in</li>
                    <li class="list-group-item">Morbi leo risus</li>
                    <li class="list-group-item">Porta ac consectetur ac</li>
                    <li class="list-group-item">Vestibulum at eros</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-6">
            <h3>AJAJ Request</h3>
            <pre>
                tu bude request
            </pre>
        </div>

        <div class="col-xs-6">
            <h3>AJAJ Response</h3>
            <pre>
                tu bude response
            </pre>
        </div>
    </div>

    <script>
        function loadCities() {
            var formData = {
                'country_id'        : $('select[name=country_id]').val()
            };

            $.ajax({
                        type        : 'GET', // define the type of HTTP verb we want to use (POST for our form)
                        url         : "{{ action('Controller@getCities') }}",
                        data        : formData, // our data object
                        dataType    : 'json', // what type of data do we expect back from the server
                        encode          : true
                    })
                    .done(function(data) {
                        console.log(JSON.stringify(data, null, 2));
                    });
        }

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