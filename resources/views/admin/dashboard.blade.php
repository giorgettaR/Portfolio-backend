@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col p-3">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="d-flex gap-2">
                        <a href="{{ route('admin.projects.index') }}" class="btn btn-primary">Progetti</a>
                        <a href="{{ route('admin.types.index') }}" class="d-block">Gestione tipologie progetti</a>
                        <a href="{{ route('admin.technologies.index') }}" class="d-block">Gestione tecnologie progetti</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
