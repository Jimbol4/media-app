@extends('app')

@section('content')
<h1 class='page-heading'>Added Media:</h1>

@if (!$media->isEmpty())
<table class="table table-striped table-bordered" id="datatable">
    
    <thead>
    <th>Title</th>
    <th>Author/Producer</th>
    <th>Media type</th>
    <th>Release date</th>
    <th>Owned</th>
    <th>Rating</th>
    </thead>
    
    <tbody>
        @foreach ($media as $item)
        <tr>
            <td><a href='{{ action('MediaController@edit', $item->id)}}'>{{ $item->title  }}</a></td>
            <td>{{ $item->author }}</td>
            <td>{{ $item->type->name }}</td>
            <td>{{ $item->release_date->toFormattedDateString() }}</td>
            <td>{!! Form::open(['data-remote', 'method' => 'PATCH', 'url' => 'media/owned/' . $item->id]) !!}
                {!! Form::checkbox('consumed', true, $item->consumed, ['data-click-submits-form']) !!}
                {!! Form::close() !!}
            </td>
            <td>
    {!! Form::open(['data-remote', 'method' => 'PATCH', 'url' => 'media/rating/' . $item->id]) !!}
    <div class='stars rating'>        
    <input class="star star-5" id="star-5-{{$item->id }}" type="radio" name="star{{-$item->id }}" value='5' data-click-submits-form {{ $item->rating == 5 ? 'checked' : '' }}/>
    <label class="star star-5" for="star-5-{{$item->id }}"></label>
    <input class="star star-4" id="star-4-{{$item->id }}" type="radio" name="star{{-$item->id }}" value='4' data-click-submits-form {{ $item->rating == 4 ? 'checked' : '' }}/>
    <label class="star star-4" for="star-4-{{$item->id }}"></label>
    <input class="star star-3" id="star-3-{{$item->id }}" type="radio" name="star{{-$item->id }}" value='3' data-click-submits-form {{ $item->rating == 3 ? 'checked' : '' }}/>
    <label class="star star-3" for="star-3-{{$item->id }}"></label>
    <input class="star star-2" id="star-2-{{$item->id }}" type="radio" name="star{{-$item->id }}" value='2' data-click-submits-form {{ $item->rating == 2 ? 'checked' : '' }}/>
    <label class="star star-2" for="star-2-{{$item->id }}"></label>
    <input class="star star-1" id="star-1-{{$item->id }}" type="radio" name="star{{-$item->id }}" value='1' data-click-submits-form {{ $item->rating == 1 ? 'checked' : '' }}/>
    <label class="star star-1" for="star-1-{{$item->id }}"></label>
    </div>   
            </td>
             
    {!! Form::close() !!}        
        </tr>
        @endforeach
    </tbody>
    
</table>
@else <h3>No media added yet. <a href='{{ URL::to('media/create') }}'>Click Here</a> to add some.</h3>

@endif
@endsection

@section('footer')
<script>
$(document).ready(function(){
    $('#datatable').DataTable();
});
</script>
@endsection