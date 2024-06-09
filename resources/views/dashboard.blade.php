<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="m-2 d-flex justify-content-end">
                    <a href="{{ route('dashboard') }}" class="btn btn-primary">New Posts</a>
                </div>
                <div class="p-6 text-gray-900 row">

                    @forelse ($posts as $post)
                        <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                            <div class="bg-white rounded shadow-sm"><img src="{{ $post->getImage() }}" alt="" class="img-fluid card-img-top">
                            <div class="p-4">
                                <p class="small text-muted mb-0">{{ $post->name }}</p>
                                <div class="d-flex align-items-center justify-content-between rounded-pill bg-light px-3 py-2 mt-4">
                                <p class="small mb-0">
                                    {{ $post->tags->pluck('name')->implode(', ') }}
                                </p>
                                </div>
                            </div>
                            </div>
                        </div>
                    @empty
                        <div class="d-flex justify-content-center">
                            No Posts
                        </div>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
