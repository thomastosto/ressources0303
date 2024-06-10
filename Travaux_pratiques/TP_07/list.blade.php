@extends('template')
@section('title') 10 articles @endsection
@section('content')
  <ul class="list-group">
@foreach($itemList as $item)
    <li class="list-group-item d-flex align-items-center">
      <div class="col-lg-10">
        <span class="badge rounded-pill bg-primary">
        {{$item->price}} €
        </span>
        <strong>{{$item->title}}</strong>
        @if(strlen($item->description) > 50)
          {{substr($item->description, 0, 50)}}...
        @else
          {{$item->description}}
        @endif
      </div>      
      <div class="col text-end">
        <a href="{{route('item.show', $item->id)}}" class="btn btn-sm btn-primary mb-1"><i class="bi bi-eye"></i></a>
      </div>
    </li>
@endforeach
  </ul>
@endsection