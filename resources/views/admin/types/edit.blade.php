@extends('layouts.app')

@section('title','Modifica tipologia')

@section('content')

<main>
  <section>
    <div class="container">
      <h2 class="fs-2">Modifica Tipologia</h2>
    </div>
    <div class="container">
      <form action="{{ route('admin.types.update', $type) }}" method="POST">

        @csrf 
        @method('PUT')

        <div class="mb-3">
          <label for="name" class="form-label">Nome tipologia</label>
          <input type="text" name="name" class="form-control" id="name" placeholder="name" value="{{ old('name', $type->name )}}">
        </div>

        <button class="btn btn-primary">Salva Modifica</button>
      </form>
    </div>
    <div class="container">
      @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
    </div>
  </section>
</main>

@endsection