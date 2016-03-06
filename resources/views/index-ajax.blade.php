@extends('layouts.master')

@section('content')
    <div id="app">
        <div class="row">
            <div class="col-xs-5">
                <form method="post" action="{{ action('AjaxController@store') }}" v-on:submit.prevent="saveCity();">
                    <fieldset>
                        <legend>Add city</legend>

                        <div class="form-section">
                            <label for="country_select">Country:</label>
                            <select name="country_id" id="country_select" class="form-control" v-model="selectedCountryId" v-on:change="countryChanged();">
                                <option v-for="country in countries" value="@{{ country.id }}">@{{country.name}}</option>
                            </select>
                        </div>

                        <div class="form-section">
                            <label for="city_name">City:</label>
                            <input type="text" name="name" placeholder="City name" id="city_name" class="form-control" v-model="cityInputName">
                        </div>

                        <div class="form-section">
                            <input type="submit" value="Save" class="btn btn-primary">
                        </div>

                        <div id="message">

                        </div>
                    </fieldset>
                </form>
            </div>

            <div class="col-xs-5 col-xs-offset-1">
                <div class="panel panel-default" v-if="cities.length > 0">
                    <div class="panel-heading">@{{ selectedCountryName }}</div>

                    <ul class="list-group">
                        <li class="list-group-item" v-for="city in cities">@{{ city.name }}</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-6" v-if="request.length > 0">
                <h3>Request</h3>
                <pre>@{{ request }}</pre>
            </div>

            <div class="col-xs-6" v-if="response.length > 0">
                <h3>AJAX Response</h3>
                <pre>@{{ response }}</pre>
            </div>
        </div>
    </div>

    <script>
        var obj = new Vue({
            el: '#app',
            data: {
                selectedCountryId: '<?= $countries->first()->id ?>',
                cities: {!! json_encode($countries->first()->cities()->getResults()) !!},
                countries: {!! json_encode($countries) !!},
                cityInputName: '',
                request: '',
                response: '',
                selectedCountryName: "{{ $countries->first()->name }}"
            },
            methods: {
                saveCity: function() {
                    var data = {
                        'country_id': this.selectedCountryId,
                        'name': this.cityInputName
                    };

                    this.request = JSON.stringify(data, null, 2);

                    $.ajax({
                        type: 'POST',
                        url: "{{ action('AjaxController@store') }}",
                        data: data,
                        dataType: 'xml',
                        async: true,
                        encode: true
                    }).done(function(data, textStatus, jqXHR) {
                        var xml = data.getElementsByTagName('data')[0];

                        var json_data = [];
                        var cities = xml.getElementsByTagName('city');
                        for (var i = 0; i < cities.length; i++) {
                            var city = {
                                name: cities[i].innerHTML
                            };

                            json_data.push(city);
                        }

                        obj.response = new XMLSerializer().serializeToString(xml);
                        obj.cities = json_data;
                        obj.cityInputName = '';
                        $("#message").html('<div class="alert alert-success alert-dismissible" role="alert">' +
                                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                                'Save successfull.</div>');
                    }).fail(function(jqXHR, textStatus, errorThrown) {
                        obj.response = textStatus;
                        $("#message").html('<div class="alert alert-danger alert-dismissible" role="alert">' +
                                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                                'Error while saving.</div>');
                    }).always(function(data, textStatus, errorThrown) {
                        console.log(data);
                    });
                },
                countryChanged: function() {
                    var data = {
                        'country_id': this.selectedCountryId
                    };

                    this.request = JSON.stringify(data, null, 2);

                    $.ajax({
                        type: 'GET',
                        url: "{{ action('AjaxController@cities') }}",
                        data: data,
                        dataType: 'xml',
                        async: true,
                        encode: true
                    }).done(function(data, textStatus, jqXHR) {
                        var xml = data.getElementsByTagName('data')[0];
                        obj.selectedCountryName = xml.getAttribute('country_name');

                        var json_data = [];
                        var cities = xml.getElementsByTagName('city');
                        for (var i = 0; i < cities.length; i++) {
                            var city = {
                                name: cities[i].innerHTML
                            };

                            json_data.push(city);
                        }

                        obj.cities = json_data;
                        obj.response = new XMLSerializer().serializeToString(xml);
                    }).fail(function(jqXHR, textStatus, errorThrown) {
                        obj.response = textStatus + '\n' + errorThrown;
                    }).always(function(data, textStatus, errorThrown) {
                        console.log(data);
                    });
                }
            }
        });
    </script>

@endsection