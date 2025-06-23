<div class="container">
    <a href="#" onclick="history.back()" class="btn btn-secondary mb-3"><i class="bi bi-arrow-left"></i> Kembali</a>

    <h2>{{ $post->title }}</h2>
    <p class="text-muted">{{ $post->created_at->format('d M Y') }}</p>

    <div>
        {!! $post->body !!}
    </div>
</div>
