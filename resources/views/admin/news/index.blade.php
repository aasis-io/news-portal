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
                    {{-- @foreach ($languages as $language)
                        @php
                            $categories = \App\Models\Category::where('language', $language->lang)
                                ->orderByDesc('id')
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
                                                <th>{{ __('Name') }}</th>
                                                <th>{{ __('Language') }}</th>
                                                <th>{{ __('Show At Nav') }}</th>
                                                <th>{{ __('Status') }}</th>
                                                <th>{{ __('Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($categories as $index => $category)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $category->name }}</td>
                                                    <td>{{ $category->language }}</td>
                                                    <td>
                                                        @if ($category->show_at_nav == 1)
                                                            <span class="badge badge-primary">{{ __('Yes') }}</span>
                                                        @else
                                                            <span class="badge badge-danger">{{ __('No') }}</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($category->status == 1)
                                                            <span class="badge badge-success">{{ __('Active') }}</span>
                                                        @else
                                                            <span class="badge badge-danger">{{ __('Inactive') }}</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.category.edit', $category->id) }}"
                                                            class="btn btn-primary"><i class="far fa-edit"></i>
                                                            {{ __('Edit') }}</a>
                                                        <a href="{{ route('admin.category.destroy', $category->id) }}"
                                                            class="btn btn-danger delete-item"><i
                                                                class="far fa-trash-alt"></i>
                                                            {{ __('Delete') }}</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endforeach --}}
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
    </script>
@endpush
