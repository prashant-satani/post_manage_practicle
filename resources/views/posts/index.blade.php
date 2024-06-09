<x-app-layout>
    @push('styles')
        <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
    @endpush

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="m-2 d-flex justify-content-end">
                    <a href="{{ route('posts.create') }}" class="btn btn-primary">Create Post</a>
                </div>
                <div class="p-6 text-gray-900">
                    <table id="posts" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>

        <script>
            $(document).ready(function(){
                $('#posts').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('posts.index') }}",
                    columns: [
                        {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                        {data: 'name', name: 'name'},
                        {data: 'created_at', name: 'created_at'},
                    ]
                });
            });
        </script>
    @endpush
</x-app-layout>
