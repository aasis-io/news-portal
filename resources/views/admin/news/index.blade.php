@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('News') }}</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('All News') }}</h4>
                <div class="card-header-action">
                    <a href="{{ route('admin.news.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> {{ __('Create New') }}
                    </a>
                </div>
            </div>
            <div class="card-body">
                <ul class="nav nav-pills" id="myTab3" role="tablist">
                    @foreach ($languages as $language)
                        <li class="nav-item mr-2">
                            <a class="nav-link {{ $loop->index == 0 ? 'active' : '' }}" id="home-tab3" data-toggle="tab"
                                href="#home-{{ $language->lang }}" role="tab" aria-controls="home"
                                aria-selected="true">{{ $language->name }}</a>
                        </li>
                    @endforeach


                </ul>
                <div class="tab-content" id="myTabContent2">
                    @foreach ($languages as $language)
                        @php
                            $news = \App\Models\News::with('category')
                                ->where('language', $language->lang)
                                ->orderBy('id', 'DESC')
                                ->get();
                        @endphp
                        <div class="tab-pane fade show {{ $loop->index == 0 ? 'active' : '' }}"
                            id="home-{{ $language->lang }}" role="tabpanel" aria-labelledby="home-tab3">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-{{ $language->lang }}">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    #
                                                </th>
                                                <th>{{ __('Image') }}</th>
                                                <th>{{ __('Title') }}</th>
                                                <th>{{ __('Category') }}</th>
                                                <th>{{ __('Is Breaking') }}</th>
                                                <th>{{ __('Is Slider') }}</th>
                                                <th>{{ __('Is Popular') }}</th>
                                                <th>{{ __('Status') }}</th>
                                                <th>{{ __('Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($news as $index => $item)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>

                                                    <td>
                                                        <img src="{{ asset($item->image) }}" width="100px" alt="">
                                                    </td>
                                                    <td>{{ $item->title }}</td>
                                                    <td>{{ $item->category->name }}</td>

                                                    <td>
                                                        <label class="custom-switch mt-2">
                                                            <input {{ $item->is_breaking_news == 1 ? 'checked' : '' }}
                                                                data-id={{ $item->id }} data-name="is_breaking_news"
                                                                value="1" type="checkbox"
                                                                class="custom-switch-input toggle-status">
                                                            <span class="custom-switch-indicator"></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="custom-switch mt-2">
                                                            <input {{ $item->show_at_slider == 1 ? 'checked' : '' }}
                                                                data-id={{ $item->id }} data-name="show_at_slider"
                                                                value="1" type="checkbox"
                                                                class="custom-switch-input toggle-status">
                                                            <span class="custom-switch-indicator"></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="custom-switch mt-2">
                                                            <input {{ $item->show_at_popular == 1 ? 'checked' : '' }}
                                                                data-id={{ $item->id }} data-name="show_at_popular"
                                                                value="1" type="checkbox"
                                                                class="custom-switch-input toggle-status">
                                                            <span class="custom-switch-indicator"></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="custom-switch mt-2">
                                                            <input {{ $item->status == 1 ? 'checked' : '' }} value="1"
                                                                data-id={{ $item->id }} data-name="status"
                                                                type="checkbox" class="custom-switch-input toggle-status">
                                                            <span class="custom-switch-indicator"></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.news.edit', $item->id) }}"
                                                            class="btn btn-primary"><i class="far fa-edit"></i>
                                                            {{ __('Edit') }}</a>
                                                        <a href="{{ route('admin.news.destroy', $item->id) }}"
                                                            class="btn btn-danger delete-item"><i
                                                                class="far fa-trash-alt"></i>
                                                            {{ __('Delete') }}</a>
                                                        <a href="{{ route('admin.news-copy', $item->id) }}"
                                                            class="btn btn-info"><i class="fa fa-copy"></i>
                                                            {{ __('Clone') }}</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        @foreach ($languages as $language)
            $("#table-{{ $language->lang }}").dataTable({
                "columnDefs": [{
                    "sortable": false,
                    "targets": [2, 3]
                }]
            });
        @endforeach

        $(document).ready(function() {
            $('.toggle-status').on('click', function() {
                let id = $(this).data('id');
                let name = $(this).data('name');
                let status = $(this).prop('checked') ? 1 : 0;
                $.ajax({
                    method: 'GET',
                    url: '{{ route('admin.toggle-news-status') }}',
                    data: {
                        id: id,
                        name: name,
                        status: status,
                    },
                    success: function(data) {
                        if (data.status == 'success') {
                            Toast.fire({
                                icon: "success",
                                title: data.message
                            });
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    },
                })

            })
        })
    </script>
@endpush
