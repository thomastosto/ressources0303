@extends('template')
@section('title') Modifier un article @endsection
@section('content')

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{url('item', $item->id)}}" method="post">
  @csrf
  @method('PUT')
  <div class="mb-3 row">
    <label for="title" class="col-sm-2 col-form-label">Intitulé</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="title" id="title" placeholder="Saisir l'intitulé de l'article" value="{{$item->title}}"/>
    </div>
  </div>
  <div class="mb-3 row">
    <label for="description" class="col-sm-2 col-form-label">Contenu</label>
    <div class="col-sm-10">
      <textarea class="form-control" id="description" name="description" rows="3" placeholder="Saisir la description de l'article">{{$item->description}}</textarea>
    </div>
  </div>
  <div class="mb-3 row">
    <label for="price" class="col-sm-2 col-form-label">Prix</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="price" id="price" placeholder="Saisir le prix de l'article" value="{{$item->price}}"/>
    </div>
  </div>
  <div class="mb-3">
    <div class="offset-sm-2 col-sm-10">
      <button class="btn btn-primary mb-1 mr-1" type="submit">Modifier</button>
      <a href="{{route('item.show',$item->id)}}" class="btn btn-danger mb-1">Annuler</a>
    </div>
  </div>
</form>
</div>
@endsection