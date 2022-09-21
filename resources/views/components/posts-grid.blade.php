@props(['posts'])

<x-post-featured-card :post="$posts[0]" />

{{-- //포스트가 1개밖에 없는데 나머지 그리드들을 불러오는 불필요한 작업을 막기 위함 --}}
@if ($posts->count() > 1)
    <div class="lg:grid lg:grid-cols-6">
        @foreach ($posts->skip(1) as $post)
            {{-- //post-card.blade.php속 내용 반환 --}}
            <x-post-card :post="$post" class="{{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2' }}" />
        @endforeach
    </div>
@endif
