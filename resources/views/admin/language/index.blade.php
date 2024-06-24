@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
    </section>
    <div class="card card-primary">
        <div class="card-header">
            <h4>All Languages</h4>
            <div class="card-header-action">
                <a href="{{ route('admin.language.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Create
                </a>
            </div>
        </div>
        <div class="card-body">
            <p>Write something here</p>
        </div>
    </div>
@endsection