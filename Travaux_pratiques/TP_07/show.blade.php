@extends('template')
@section('title') Affichage d'un article @endsection
@section('content')
<i>Prix : {{$item->price}} €</i>
<strong>{{$item->title}}</strong>
{{$item->description}}<br/>
<a href="{{url('item/')}}">Retour à la liste</a>
@endsection