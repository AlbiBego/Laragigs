@php
 //we can erite php code here if we want and use it outside the php directive   
@endphp

@unless(count($listings) == 0)
<h1>{{$heading}}</h1>

@foreach ($listings as $listing) 
  <h3><a href="/listings/{{$listing['id']}}">{{$listing['title']}}</a></h3>
  <p>{{$listing['description']}}</p>
@endforeach

@else
  <p>There are no listings</p>
@endunless
