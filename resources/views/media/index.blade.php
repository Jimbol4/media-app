@extends('app')

@section('content')
<h1 class='page-heading'>Added Media:</h1>

@if (!$media->isEmpty())
<table class="table table-striped table-bordered">
    
    <thead>
    <th>Title</th>
    <th>Author/Producer</th>
    <th>Media type</th>
    <th>Release date</th>
    <th>Owned/Consumed</th>
    <th>Rating</th>
    </thead>
    
    <tbody>
        @foreach ($media as $item)
        <tr>
            <td>{{ $item->title  }}</td>
            <td>{{ $item->author }}</td>
            <td>{{ $item->type }}</td>
            <td>{{ $item->release_date }}</td>
            <td>{{ $item->consumed }}</td>
            <td>{{ $item->rating }}</td>
        </tr>
        @endforeach
    </tbody>
    
</table>
@else <h3>No media added yet. <a href='{{ URL::to('media/create') }}'>Click Here</a> to add some.</h3>

@endif
@endsection