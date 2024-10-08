@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('News') }}</h1>
        </div>
    </section>
    <div class="card card-primary">
        <div class="card-header">
            <h4>{{ __('Create News') }}</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.news.store') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">{{ 'Language' }}</label>
                    <select name="language" id="language-select" class="form-control select2">
                        <option value="">{{ __('-- Select --') }}</option>
                        @foreach ($languages as $key => $lang)
                            <option value="{{ $lang->lang }}">
                                {{ $lang->name }}</option>
                        @endforeach
                    </select>
                    @error('language')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">{{ __('Category') }}</label>
                    <select name="category" id="category" class="form-control select2">
                        <option value="">-- {{ __('Select') }} --</option>
                    </select>
                    @error('category')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">{{ __('Image') }}</label>
                    <div id="image-preview" class="image-preview">
                        <label for="image-upload" id="image-label">{{ __('Choose File') }}</label>
                        <input type="file" name="image" id="image-upload">
                    </div>
                    @error('image')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">{{ __('Title') }}</label>
                    <input name="title" type="text" class="form-control" id="title">
                    @error('title')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">{{ __('Content') }}</label>
                    <textarea name="content" class="summernote"></textarea>
                    @error('content')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label>{{ __('Tags') }}</label>
                    <input name="tags" type="text" class="form-control inputtags">
                    @error('tags')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">{{ __('Meta Title') }}</label>
                    <input name="meta_title" type="text" class="form-control" id="meta_title">
                    @error('meta_title')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">{{ __('Meta Description') }}</label>
                    <textarea name="meta_description" class="form-control"></textarea>
                    @error('meta_description')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>


                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <div class="control-label">{{ __('Status') }}</div>
                            <label class="custom-switch mt-2">
                                <input value="1" type="checkbox" name="status" class="custom-switch-input">
                                <span class="custom-switch-indicator"></span>
                            </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <div class="control-label">{{ __('Is Breaking News') }}</div>
                            <label class="custom-switch mt-2">
                                <input value="1" type="checkbox" name="is_breaking_news" class="custom-switch-input">
                                <span class="custom-switch-indicator"></span>
                            </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <div class="control-label">{{ __('Show At Slider') }}</div>
                            <label class="custom-switch mt-2">
                                <input value="1" type="checkbox" name="show_at_slider" class="custom-switch-input">
                                <span class="custom-switch-indicator"></span>
                            </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <div class="control-label">{{ __('Show At Popular') }}</div>
                            <label class="custom-switch mt-2">
                                <input value="1" type="checkbox" name="show_at_popular" class="custom-switch-input">
                                <span class="custom-switch-indicator"></span>
                            </label>
                        </div>
                    </div>
                </div>


                <button class="btn btn-primary" type="submit">{{ __('Create News') }}</button>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#language-select').on('change', function() {
                let lang = $(this).val();
                $.ajax({
                    method: 'GET',
                    url: "{{ route('admin.fetch-news-category') }}",
                    data: {
                        lang: lang
                    },
                    success: function(data) {
                        $('#category').html("");
                        $('#category').html(`<option value="
                            ">-- {{ __('Select') }} --</option>`);
                        $.each(data, function(index, data) {
                            $('#category').append(
                                `<option value="${data.id}">${data.name}</option>`);
                        })
                    },
                    error: function(error) {
                        console.log(error);
                    }
                })
            })
        })
    </script>
@endpush
