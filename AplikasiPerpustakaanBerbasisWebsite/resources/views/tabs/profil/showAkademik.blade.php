<div class="container">

    <h2>{{ $post->title }}</h2>
    <p class="text-muted">{{ $post->created_at->format('d M Y') }}</p>

    @if($post->image)
        <div class="mb-3">
            <img src="{{ asset('images/posts/' . $post->image) }}" alt="{{ $post->title }}" class="img-fluid rounded shadow-sm">
        </div>
    @endif

    <div>
        {!! $post->body !!}
    </div>

    <a href="javascript:history.back()" class="btn btn-outline-primary mb-4 d-inline-flex align-items-center shadow-sm rounded-pill px-4 py-2 transition-all" style="gap: 8px;">
        <i class="bi bi-arrow-left fs-5"></i>
        <span class="fw-semibold">Kembali</span>
    </a>
</div>
