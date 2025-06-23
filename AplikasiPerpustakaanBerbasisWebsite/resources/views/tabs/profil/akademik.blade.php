<div class="container">
    
    <h2 class="mb-4">Arsip Akademik</h2>

    @if($posts->count())
        @foreach($posts as $post)
            <div class="mb-4 border-bottom pb-2">
                <h5><a href="{{ route('akademik.show', $post->slug) }}">{{ $post->title }}</a></h5>
                <p class="text-muted">{{ $post->created_at->format('d M Y') }}</p>
                <p>{{ Str::limit(strip_tags($post->body), 100) }}</p>
            </div>
        @endforeach

        <div class="d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    @else
        <p>Tidak ada arsip akademik.</p>
    @endif
</div>
