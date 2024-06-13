@extends('layouts.app')

@section('title','Types')

@section('content')

<main>
  <section>
    <div class="container">
      <div class="row p-4">
        <div class="col-auto">
            <h1 class="fs-2">Tecnologie</h1>
        </div>
        <div class="col-auto ms-auto">
          <a href="{{ route('admin.technologies.create') }}" class="btn btn-primary">Aggiungi tecnologia</a>
        </div>
      </div>
    </div>
    <div class="container">
      <table class="table">
  <thead>
    <tr>
      <th>Nome tecnologia</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($technologies as $technology)
      <tr>
        <td>{{ $technology->name }}</td>
        <td>
          <a href="{{ route('admin.technologies.edit',$technology) }}" class="align-middle">Modifica</a>
        </td>
        <td>
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
              Elimina
            </button>

            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header justify-content-center">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Vuoi davvero eliminare la tecnologia?</h1>
                  </div>
                  <div class="modal-footer d-flex justify-content-center">
                    <button type="button" class="btn btn-outline-success" data-bs-dismiss="modal">Ho cambiato idea</button>
                    <form action="{{ route('admin.technologies.destroy',$technology) }}" method="POST">
                      @method('DELETE')
                      @csrf

                      <button class="btn btn-outline-danger">Elimina</button>

                    </form>
                  </div>
                </div>
              </div>
            </div>
        </td>
        
      </tr>
    @endforeach
  </tbody>
</table>
    </div>
  </section>
</main>
@endsection