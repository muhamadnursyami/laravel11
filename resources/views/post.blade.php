<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <article class="py-8 max-w-screen-md >

        <h2 class="mb-1 text-3xl tracking-tighter font-bold text-gray-900">
        {{ $post['title'] }}</h2>
        <div class="text-base text-gray-500">
            <a href=""> {{ $post['author'] }}</a>
        </div>
        {{-- limit kata  --}}
        <p class="my-4 font-light">{{ $post['body'] }}
        </p>
        <a href="/posts" class="font-medium text-blue-300 hover:underline">&laquo;Back To Post</a>
    </article>

</x-layout>
