@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Category') }}</h1>
        </div>
    </section>
    <div class="card card-primary">
        <div class="card-header">
            <h4>{{ __('Edit Category') }}</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.category.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">{{ 'Language' }}</label>
                    <select name="language" id="language-select" class="form-control select2">
                        <option value="">{{ __('-- Select --') }}</option>
                        @foreach ($languages as $key => $lang)
                            <option value="{{ $lang->lang }}" {{ $lang->lang == $category->language ? 'selected' : '' }}>
                                {{ $lang->name }}</option>
                        @endforeach
                    </select>
                    @error('language')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">{{ __('Name') }}</label>
                    <input name="name" value="{{ $category->name }}" type="text" class="form-control" id="name">
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">{{ __('Show at Nav') }}</label>
                    <select name="show_at_nav" id="" class="form-control">
                        <option {{ $category->show_at_nav == 0 ? 'selected' : '' }} value="0">{{ __('No') }}
                        </option>
                        <option {{ $category->show_at_nav == 1 ? 'selected' : '' }} value="1">{{ __('Yes') }}
                        </option>
                    </select>
                    @error('default')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">{{ __('Status') }}</label>
                    <select name="status" id="" class="form-control">
                        <option {{ $category->status == 1 ? 'selected' : '' }} value="1">{{ __('Active') }}</option>
                        <option {{ $category->status == 0 ? 'selected' : '' }} value="0">{{ __('Inactive') }}
                        </option>
                    </select>
                    @error('status')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <button class="btn btn-primary" type="submit">{{ __('Update') }}</button>
            </form>
        </div>
    </div>
@endsection
