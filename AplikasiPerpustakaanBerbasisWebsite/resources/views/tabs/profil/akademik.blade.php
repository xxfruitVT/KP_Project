<div class="container py-4">
    <h2 class="mb-4">Akademik</h2>
    <p>Berikut ini adalah informasi akademik dari SMP Padmajaya Palembang.</p>

    {{-- Ambil data post langsung di view --}}
    @php
        use App\Models\Post;
        $posts = Post::latest()->paginate(6);
    @endphp

    @if ($posts->count())
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach ($posts as $post)
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title text-danger">
                                <a href="{{ route('posts.show', $post->slug) }}" class="text-decoration-none text-danger">
                                    {{ $post->title }}
                                </a>
                            </h5>
                            <p class="card-text">
                                {{ \Illuminate\Support\Str::limit(strip_tags($post->content), 100) }}
                            </p>
                        </div>
                        <div class="card-footer bg-white border-top-0">
                            <a href="{{ route('posts.show', $post->slug) }}" class="btn btn-sm btn-outline-primary">
                                Selengkapnya <i class="bi bi-arrow-right-circle"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="mt-4">
            {{ $posts->links('pagination::bootstrap-5') }}
        </div>
    @else
        <p class="text-muted mt-3">Belum ada data akademik untuk ditampilkan.</p>
    @endif
</div>
