<x-app-layout>
    @push('styles')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <style>
            .error {
                color: #ff0000;
            }
        </style>
    @endpush

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post Management') }}
        </h2>
    </x-slot>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="m-2 d-flex justify-content-end">
                    <a href="{{ route('posts.index') }}" class="btn btn-primary">Back</a>
                </div>
                <div class="p-6 text-gray-900">
                    <form id="create_post" method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group mt-2">
                            <label for="post_name">Name</label>
                            <input id="post_name" name="post_name" type="text" class="form-control @error('post_name') is-invalid @enderror" required>

                            @error('post_name')
                                <div class="error">{{ $message }}</div>
                            @enderror
                          </div>

                          <div class="form-group mt-2">
                            <label for="post_image">Image</label>
                            <input id="post_image" name="post_image" type="file" class="form-control @error('post_image') is-invalid @enderror" required>

                            @error('post_image')
                                <div class="error">{{ $message }}</div>
                            @enderror
                          </div>

                          <div class="form-group mt-2">
                            <label for="post_tags">Tags</label>
                            <select name="post_tags[]" id="post_tags" class="select2" multiple required>
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>

                            @error('post_tags')
                                <div class="error">{{ $message }}</div>
                            @enderror
                          </div>

                          <button class="btn btn-primary mt-2" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <script>
            $(document).ready(function(){
                $('#post_tags').select2({
                    width: '100%',
                    placeholder: 'Select Tags',
                    allowClear: true
                });

                $('#create_post').validate({
                    errorPlacement: function (error, element) {
                        if(element.hasClass('select2') && element.next('.select2-container').length) {
                            error.insertAfter(element.next('.select2-container'));
                        }
                        else {
                            error.insertAfter(element);
                        }
                    }
                });
            });
        </script>
    @endpush
</x-app-layout>
