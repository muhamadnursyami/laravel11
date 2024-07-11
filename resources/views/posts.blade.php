<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>


    @foreach ($posts as $post)
        <article class="py-8 max-w-screen-md border-b-2 border-gray-400">
            <a href="/posts/{{ $post['slug'] }}" class="hover:underline">
                <h2 class="mb-1 text-3xl tracking-tighter font-bold text-gray-900"> {{ $post['title'] }}</h2>

            </a>
            <div class="text-base text-gray-950">
                by
                <a href="/authors/{{ $post->author->username }}" class="hover:underline text-base text-gray-500">
                    {{ $post->author->name }}</a> |
                in
                <a href="/categories/{{ $post->category->slug }}" class="hover:underline text-base text-gray-500">
                    {{ $post->category->name }}</a>
                {{ $post->created_at->diffForHumans() }}
            </div>
            {{-- limit kata  --}}
            <p class="my-4 font-light">{{ Str::limit($post['body'], 50) }}
            </p>
            <a href="/posts/{{ $post['slug'] }}" class="font-medium text-blue-300 hover:underline">Read more &raquo;</a>
        </article>
    @endforeach
</x-layout>
