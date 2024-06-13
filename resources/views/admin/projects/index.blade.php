@extends('layouts.app')

@section('title','Projects')

@section('content')

<main>
  <section>
    <div class="container">
      <div class="row p-4">
        <div class="col-auto">
            <h1 class="fs-2">Projects</h1>
        </div>
        <div class="col-auto ms-auto">
          <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">New Project</a>
        </div>
      </div>
    </div>
    <div class="container">
      <table class="table">
  <thead>
    <tr>
      <th>Titolo</th>
      <th>Tipologia</th>
      <th>Descrizione</th>
      <th>Link GitHub</th>
      <th>Linguaggi</th>
      <th>Softwares</th>
      <th>Autori</th>
      <th>Azioni</th>
      </tr>
  </thead>
  <tbody>
    @foreach ($projects as $project)
      <tr>
        <td>{{ $project->title }}</td>
        <td>{{ $project->type->name }}</td>
        <td>{{ $project->description }}</td>
        <td><a href="{{ $project->repository_link }}">Progetto</a></td>
        <td>{{ $project->languages }}</td>
        <td>{{ $project->softwares }}</td>
        <td>{{ $project->authors }}</td>
        <td class="d-flex gap-2">
          <a href="{{ route('admin.projects.show', $project ) }}" class="align-middle">
          Show details
          </a>
          <a href="{{ route('admin.projects.edit',$project) }}" class="align-middle">Edit</a>
          <!-- Button trigger modal -->
          <a hre="#" class="link-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
              Elimina
          </a>

            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header justify-content-center">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Vuoi davvero eliminare il progetto?</h1>
                  </div>
                  <div class="modal-footer d-flex justify-content-center">
                    <button type="button" class="btn btn-outline-success" data-bs-dismiss="modal">Ho cambiato idea</button>
                    <form action="{{ route('admin.projects.destroy',$project) }}" method="POST">
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