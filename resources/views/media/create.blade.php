@extends('app')

@section('content')
<h1 class='page-heading'>Add Media:</h1>

{!! Form::model($media = new \App\Media, ['action' => 'MediaController@store']) !!}

@include('media.form', ['submitButton' => 'Create'])

{!! Form::close() !!}

@endsection
