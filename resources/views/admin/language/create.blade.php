@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
    </section>
    <div class="card card-primary">
        <div class="card-header">
            <h4>Create Language</h4>
        </div>
        <div class="card-body">
            <form action="">
                <div class="form-group">
                    <label for="">Language</label>
                    <select name="" id="language-select" class="form-control select2">
                        <option value="">-- Select --</option>
                        @foreach (config('language') as $key => $lang)
                            <option value="{{ $key }}">{{ $lang['name'] }}</option>
                        @endforeach
                        <option value=""></option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Slug</label>
                    <input readonly type="text" class="form-control" id="slug">
                </div>
                <div class="form-group">
                    <label for="">Is it default</label>
                    <select name="" id="" class="form-control">
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Status</label>
                    <select name="" id="" class="form-control">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
                <button class="btn btn-primary" type="submit">{{ __('Create') }}</button>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#language-select').on('change', function() {
                let value = $(this).val();
                $('#slug').val(value);
            })
        })
    </script> 
@endpush
