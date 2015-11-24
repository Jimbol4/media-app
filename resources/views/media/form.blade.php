<div class='form-group'>
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'required']) !!}
</div>

<div class='form-group'>
    {!! Form::label('author', 'Author/Producer:') !!}
    {!! Form::text('author', null, ['class' => 'form-control', 'required']) !!}
</div>

<div class='form-group'>
    {!! Form::label('type_id', 'Media Type:') !!}
    {!! Form::select('type_id', \App\MediaType::getTypes(), $media->type_id, ['class' => 'form-control', 'required']) !!}
</div>

<div class='form-group'>
    {!! Form::label('release_date', 'Release Date:') !!}
    {!! Form::text('release_date', $media->release_date->format('m/d/Y'), ['class' => 'form-control datepicker', 'required']) !!}
</div>

<div class='form-group'>
    {!! Form::label('consumed', 'Owned/Consumed:') !!}
    {!! Form::checkbox('consumed', true, $media->consumed, ['class' => 'form-control']) !!}
</div>

<div class='form-group rating'>
<div class="stars">
    {!! Form::label('rating', 'Rating:') !!} <br>
    <input class="star star-5" id="star-5" type="radio" name="rating" value='5' {{ $media->rating == 5 ? 'checked' : '' }}/>
    <label class="star star-5" for="star-5"></label>
    <input class="star star-4" id="star-4" type="radio" name="rating" value='4' {{ $media->rating == 4 ? 'checked' : '' }}/>
    <label class="star star-4" for="star-4"></label>
    <input class="star star-3" id="star-3" type="radio" name="rating" value='3' {{ $media->rating == 3 ? 'checked' : '' }}/>
    <label class="star star-3" for="star-3"></label>
    <input class="star star-2" id="star-2" type="radio" name="rating" value='2' {{ $media->rating == 2 ? 'checked' : '' }}/>
    <label class="star star-2" for="star-2"></label>
    <input class="star star-1" id="star-1" type="radio" name="rating" value='1' {{ $media->rating == 1 ? 'checked' : '' }}/>
    <label class="star star-1" for="star-1"></label>
    <button class='clear btn btn-default'>Clear</button>
</div>

</div>

<div class='form-group'>
    {!! Form::submit($submitButton, ['class' => 'form-control btn btn-primary']) !!}
</div>

@include('errors.list')

@section('footer')
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
    <script type="text/javascript">
    $('#type_id').select2({
        tags: true
    });
    </script>
    
@endsection