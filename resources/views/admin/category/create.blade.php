@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Category') }}</h1>
        </div>
    </section>
    <div class="card card-primary">
        <div class="card-header">
            <h4>{{ __('Create Category') }}</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.category.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">{{ 'Language' }}</label>
                    <select name="language" id="language-select" class="form-control select2">
                        <option value="">{{ __('-- Select --') }}</option>
                        @foreach ($languages as $key => $lang)
                            <option value="{{ $lang->lang }}"
                                @if ($lang->lang == 'en') {
                                    {{ 'selected' }}
                                } @endif>
                                {{ $lang->name }}</option>
                        @endforeach
                    </select>
                    @error('language')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">{{ __('Name') }}</label>
                    <input name="name" type="text" class="form-control" id="name">
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">{{ __('Show at Nav') }}</label>
                    <select name="show_at_nav" id="" class="form-control">
                        <option value="0">{{ __('No') }}</option>
                        <option value="1">{{ __('Yes') }}</option>
                    </select>
                    @error('default')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">{{ __('Status') }}</label>
                    <select name="status" id="" class="form-control">
                        <option value="1">{{ __('Active') }}</option>
                        <option value="0">{{ __('Inactive') }}</option>
                    </select>
                    @error('status')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <button class="btn btn-primary" type="submit">{{ __('Create') }}</button>
            </form>
        </div>
    </div>
@endsection
