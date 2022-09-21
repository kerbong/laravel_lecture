<x-layout>

    @include ('_posts-header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        {{-- //게시글이 하나라도 있다면 아래 내용 실행 --}}
        @if ($posts->count())
            <x-posts-grid :posts="$posts" />
            {{-- //그렇지 않다면 포스트가 없다는 내용 반환 --}}
        @else
            <p class="text-center">No posts yet. Plase check back </p>
        @endif
    </main>

</x-layout>
