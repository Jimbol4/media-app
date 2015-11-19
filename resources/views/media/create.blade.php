@extends('app')

@section('content')
<h1 class='page-heading'>Add Media:</h1>

{!! Form::open(['action' => 'MediaController@store']) !!}

<div class='form-group'>
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class='form-group'>
    {!! Form::label('author', 'Author/Producer:') !!}
    {!! Form::text('author', null, ['class' => 'form-control']) !!}
</div>

<div class='form-group'>
    {!! Form::label('type_id', 'Media Type:') !!}
    {!! Form::select('type_id', \App\MediaType::getTypes(), old('type_id'), ['class' => 'form-control']) !!}
</div>

<div class='form-group'>
    {!! Form::label('release_date', 'Release Date:') !!}
    {!! Form::text('release_date', null, ['class' => 'form-control datepicker']) !!}
</div>

<div class='form-group'>
    {!! Form::label('consumed', 'Owned/Consumed:') !!}
    {!! Form::checkbox('consumed', 1, 0, ['class' => 'form-control']) !!}
</div>

<div class='form-group rating'>
<div class="stars">
    {!! Form::label('star', 'Rating:') !!} <br>
    <input class="star star-5" id="star-5" type="radio" name="star" value='5'/>
    <label class="star star-5" for="star-5"></label>
    <input class="star star-4" id="star-4" type="radio" name="star" value='4'/>
    <label class="star star-4" for="star-4"></label>
    <input class="star star-3" id="star-3" type="radio" name="star" value='3'/>
    <label class="star star-3" for="star-3"></label>
    <input class="star star-2" id="star-2" type="radio" name="star" value='2'/>
    <label class="star star-2" for="star-2"></label>
    <input class="star star-1" id="star-1" type="radio" name="star" value='1'/>
    <label class="star star-1" for="star-1"></label>
    <button class='clear btn btn-default'>Clear</button>
</div>

</div>

<div class='form-group'>
    {!! Form::submit('Submit', ['class' => 'form-control btn btn-primary']) !!}
</div>

{!! Form::close() !!}

@endsection

@section('footer')
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <script>$('.datepicker').datepicker();
            $('.clear').click(function(e){
                   e.preventDefault();
                   $('#star-1').prop('checked', false);
                   $('#star-2').prop('checked', false);
                   $('#star-3').prop('checked', false);
                   $('#star-4').prop('checked', false);
                   $('#star-5').prop('checked', false);
            });
    </script>
@endsection