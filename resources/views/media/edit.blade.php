@extends('app')

@section('content')
<h1 class='page-heading'>Edit Media:</h1>

{!! Form::model($media, ['method' => 'PATCH', 'action' => ['MediaController@update', $media->id]]) !!}

@include('media.form', ['submitButton' => 'Edit'])

{!! Form::close() !!}

{!! Form::model($media, ['method' => 'DELETE', 'action' => ['MediaController@destroy', $media->id]]) !!}
    
    <div class='form-group'>
        {!! Form::submit('Delete media', ['class' => 'btn btn-primary form-control']) !!}
    </div>

@endsection
