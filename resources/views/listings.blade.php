@extends('layout')

@section('content')

@include('partials._hero')

<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

  @unless(count($listings) == 0)

    @foreach ($listings as $listing)
    <h3><a href="/listings/{{$listing['id']}}">{{$listing['title']}}</a></h3>
    <p>{{$listing['description']}}</p>
    @endforeach

  @else
    <p>There are no listings</p>
  @endunless

</div>

@endsection
