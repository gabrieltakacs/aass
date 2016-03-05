@extends('layouts.master')

@section('content')

    <h3> Pridať miesto:</h3>

    <div class="buttonHolder">
        {!! Form::submit('Submit',['class'=>'pull-right btn btn-primary'])!!}
    </div>


@endsection