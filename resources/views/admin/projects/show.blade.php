@extends('layouts.admin')

@section('page_name') | {{ $project->title }}  @endsection

@section('content')
<div class="container-fluid mt-4">
    @if (session('success'))
        <div class="alert alert-success mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="btn-box py-3">
        <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-warning text-light">
            <i class="fa-solid fa-pencil"></i>
        </a>
        <form
            action="{{ route('admin.projects.destroy', $project->id) }}"
            method="POST"
            class="d-inline"
            onsubmit="return confirm('Do you really want to delete this project? You won\'t be able to recover it later')">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger text-light">
                <i class="fa-solid fa-trash-can"></i>
            </button>
        </form>
    </div>
    
    <div class="card p-5">
        <div class="row justify-content-center">
            <div class="col-md-3">
                @if (str_contains($project->img, 'https') )
                <img src="{{ $project->img }}" alt="{{ $project->title }}" class="w-100">

                @else
                    <img src="{{ asset('storage/'.$project->img) }}" alt="{{ $project->title }}" class="w-100">
                @endif
            </div>
            <div class="col-md-7">
                <h2>{{ $project->title }}</h2>
                <p>{{ $project->link }}</p>
                <p>{{ $project->description }}</p>
            </div>
        </div>
    </div>
</div>
@endsection