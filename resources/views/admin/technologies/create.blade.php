@extends('layouts.app')

@section('title','Nuova tipologia')

@section('content')

<main>
  <section>
    <div class="container">
      <h2 class="fs-2">Nuova Tipologia</h2>
    </div>
    <div class="container">
      <form action="{{ route('admin.types.store') }}" method="POST">

        @csrf 

        <div class="mb-3">
          <label for="name" class="form-label">Nome tipologia</label>
          <input type="text" name="name" class="form-control" id="name" placeholder="name" value="{{ old('name') }}">
        </div>

        <button class="btn btn-primary">Aggiungi Tipologia</button>
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