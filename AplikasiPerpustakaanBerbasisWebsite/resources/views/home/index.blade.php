@extends('layoutseperpus.home')
@section('content')

<section id="billboard">

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <button class="prev slick-arrow">
                    <i class="icon icon-arrow-left"></i>
                </button>

                <div class="main-slider pattern-overlay">
                    @if ( $newBooks->count() == 0 )
                    <div class="slider-item">
                        <div class="banner-content">
                            <h2>Maaf buku saat ini tidak tersedia</h2>
                            <p>Kami sedang dalam perbaiki sistem saat ini, mohon menunggu beberapa saat lagi</p>
                        </div><!--banner-content-->
                        <img src="{{ asset('Home/images/main-banner1.jpg') }}" alt="banner" class="banner-image">
                    </div><!--slider-item-->
                    @else
                    @foreach ( $newBooks as $book )
                    <div class="slider-item">
                        <div class="banner-content">
                            <h2 class="banner-title">{{ $book->title }}</h2>
                            <p>{{ $book->description }}</p>
                            <div class="btn-wrap">
                                <a href="{{ route('buku.index') }}" class="btn btn-outline-accent btn-accent-arrow">{{ $book->status }}</a>
                            </div>
                        </div><!--banner-content-->
                        <img src="{{ asset('storage/'. $book->book_image) }}" alt="banner" class="banner-image" width="400" height="250">
                    </div><!--slider-item-->

                    @endforeach
                    @endif
                </div><!--slider-->

                <button class="next slick-arrow">
                    <i class="icon icon-arrow-right"></i>
                </button>

            </div>
        </div>
    </div>

</section>

<section id="client-holder" data-aos="fade-up" style="margin-bottom: 5rem;">
    <div class="container">
        <div class="row">
            <div class="inner-content d-flex justify-content-center">
                <div class="logo-wrap">
                    <div class="grid">
                        <a href="#" style="margin-right: 2rem;"><img src="https://akupintar.id/documents/20143/0/Universitas-Muhammadiyah-Ponorogo.png/4fdcd695-13b3-1682-3b70-dfe76d29222f?version=1.0&t=1535017350970&imageThumbnail=1" alt="client" width="150"></a>
                        <a href="#"><img src="https://www.um-surabaya.ac.id/uploads/home/education/mbkm/foto_akreditasi-admin-QTwgrG.webp" class="mt-3" alt="client" width="350"></a>
                    </div>
                </div><!--image-holder-->
            </div>
        </div>
    </div>
    <style>
        @media only screen and (max-width: 767px) {
            .inner-content {
                display: block;
                text-align: center;
            }

            .logo-wrap {
                display: inline-block;
            }

            .mt-3 {
                margin-top: 3rem;
            }
        }
    </style>
</section>

<section id="featured-books" class="py-5 my-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="section-header align-center">
                    <div class="title">
                        <span>Informasi Buku yang Terbaru</span>
                    </div>
                    <h2 class="section-title">Buku Terbaru</h2>
                </div>

                <div class="product-list" data-aos="fade-up">
                    <div class="row">

                        @if ( $allBooks->count() > 0 )
                        @foreach ( $allBooks as $book )
                        <div class="col-md-3">
                            <div class="product-item">
                                <figure class="product-style">
                                    <img src="{{ asset('storage/'. $book->book_image) }}" alt="Books" class="product-item">
                                    <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Pinjam</button>
                                </figure>
                                <figcaption>
                                    <h3>{{ $book->title }}</h3>
                                    <span>{{ $book->author }}</span>
                                    <div class="item-price">{{ $book->status }}</div>
                                </figcaption>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <div class="text-center">
                            <h3 style="font-size: larger;">Buku tidak tersedia, segera hubungi administrator.</h3>
                        </div>
                        @endif

                    </div><!--ft-books-slider-->
                </div><!--grid-->


            </div><!--inner-content-->
        </div>

        <div class="row">
            <div class="col-md-12">

                <div class="btn-wrap align-right">
                    <a href="{{ route('buku.index') }}" class="btn-accent-arrow">Lihat Semua buku terbaru <i
                            class="icon icon-ns-arrow-right"></i></a>
                </div>

            </div>
        </div>
    </div>
</section>

<section id="best-selling" class="leaf-pattern-overlay">
    <div class="corner-pattern-overlay"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if ( $bestBook == null )
                <div class="text-center">
                    <h3 style="font-size: larger;">Buku terlaris tidak tersedia,
                        segera hubungi administrator.</h3>
                </div>
                @else
                <div class="row">
                    <div class="col-md-6">
                        <figure class="products-thumb">
                            <img src="{{ asset('storage/'. $bestBook->book_image) }}" alt="book" class="single-image">
                        </figure>
                    </div>

                    <div class="col-md-6">
                        <div class="product-entry">
                            <h2 class="section-title divider">Buku Populer</h2>

                            <div class="products-content">
                                <div class="author-name">{{ $bestBook->author }}</div>
                                <h3 class="item-title">{{ $bestBook->title }}</h3>
                                <p>{{ $bestBook->description }}</p>
                                <div class="item-price">{{ $bestBook->status }}</div>
                            </div>

                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

<section id="popular-books" class="bookshelf py-5 my-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="section-header align-center">
                    <div class="title">
                        <span>Buku berdasarkan Genre</span>
                    </div>
                    <h2 class="section-title">Genre</h2>
                </div>

                <ul class="tabs">
                    <li data-tab-target="#all-genre" class="active tab">Semua Genre</li>
                    @foreach ( $genres as $genre )
                    <li data-tab-target="#{{ $genre->name }}" class="tab">{{ $genre->name }}</li>
                    @endforeach
                </ul>

                <div class="tab-content">
                    <div id="all-genre" data-tab-content class="active">
                        <div class="row">
                            @foreach ( $books->take(4) as $book )
                            <div class="col-md-3">
                                <div class="product-item">
                                    <figure class="product-style">
                                        <img src="{{ asset('storage/'. $book->book_image) }}" alt="Books" class="product-item">
                                        <button type="button" class="add-to-cart" data-product-tile="add-to-cart" onclick="location.href='{{ route('buku.index') }}'">Pinjam</button>
                                    </figure>
                                    <figcaption>
                                        <h3>{{ $book->title }}</h3>
                                        <span>{{ $book->author }}</span>
                                        <div class="item-price">{{ $book->status }}</div>
                                    </figcaption>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="row">
                            @foreach ( $books->skip(4)->take(4) as $book )
                            <div class="col-md-3">
                                <div class="product-item">
                                    <figure class="product-style">
                                        <img src="{{ asset('storage/'. $book->book_image) }}" alt="Books" class="product-item">
                                        <button type="button" class="add-to-cart" data-product-tile="add-to-cart" onclick="location.href='{{ route('buku.index') }}'">Pinjam</button>
                                    </figure>
                                    <figcaption>
                                        <h3>{{ $book->title }}</h3>
                                        <span>{{ $book->author }}</span>
                                        <div class="item-price">{{ $book->status }}</div>
                                    </figcaption>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    @foreach ( $genres as $genre )
                    <div id="{{ $genre->name }}" data-tab-content>
                        <div class="row">
                            @foreach ( $genre->books as $book )
                            <div class="col-md-3">
                                <div class="product-item">
                                    <figure class="product-style">
                                        <img src="{{ asset('storage/'. $book->book_image) }}" alt="Books" class="product-item">
                                        <button type="button" class="add-to-cart" data-product-tile="add-to-cart" onclick="location.href='{{ route('buku.index') }}'">Pinjam</button>
                                    </figure>
                                    <figcaption>
                                        <h3>{{ $book->title }}</h3>
                                        <span>{{ $book->author }}</span>
                                        <div class="item-price">{{ $book->status }}</div>
                                    </figcaption>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>

            </div><!--inner-tabs-->

        </div>
    </div>
</section>

<section id="quotation" class="align-center pb-5 mb-5">
    <div class="inner-content">
        <h2 class="section-title divider">Kutipan Buku</h2>
        <blockquote data-aos="fade-up">
            <q>“We are what we repeatedly do. Excellence, then, is not an act, but a habit.”</q>
            <div class="author-name">Aristoteles</div>
        </blockquote>
    </div>
</section>

<section id="special-offer" class="bookshelf pb-5 mb-5">
    <div class="section-header align-center">
        <div class="title">
            <span>Pilihan buku sering dikunjungi</span>
        </div>
        <h2 class="section-title">Buku sering dikunjungi</h2>
    </div>

    <div class="container">
        <div class="row">
            <div class="inner-content">
                <div class="product-list" data-aos="fade-up">
                    <div class="grid product-grid">
                        @foreach($bestVisitorBooks as $bestVisitorBook)
                        <div class="product-item">
                            <figure class="product-style">
                                <img src="{{ asset('storage/'. $bestVisitorBook->book->book_image) }}" alt="Books" class="product-item">
                                <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Pinjam</button>
                            </figure>
                            <figcaption>
                                <h3>{{ $bestVisitorBook->book->title }}</h3>
                                <span>{{ $bestVisitorBook->book->author }}</span>
                                <div class="item-price">
                                    <span class="">{{ $bestVisitorBook->book->status }}</span>
                                </div>
                            </figcaption>
                        </div>
                        @endforeach
                    </div><!--grid-->
                </div>
            </div><!--inner-content-->
        </div>
    </div>
</section>

<section id="subscribe">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8">
                <div class="row">

                    <div class="col-md-6">

                        <div class="title-element">
                            <h2 class="section-title divider">Ikuti terus informasi buku</h2>
                        </div>

                    </div>
                    <div class="col-md-6">

                        <div class="subscribe-content" data-aos="fade-up">
                            <p>Banyak sekali pilihan buku yang dapat anda baca</p>
                            <form id="form">
                                <input type="text" name="email" placeholder="Enter your email addresss here">
                                <button class="btn-subscribe">
                                    <span>send</span>
                                    <i class="icon icon-send"></i>
                                </button>
                            </form>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

<footer id="footer" style="padding: 20px; font-family: Arial, sans-serif;">
    <div class="container" style="max-width: 1200px; margin: 0 auto;">
        <div class="row" style="display: flex; flex-wrap: wrap; justify-content: space-between;">
            <div class="col" style="flex: 1; padding: 10px;">
                <h5 style="font-weight: bold;">Ikuti Kami</h5>
                <ul style="list-style-type: none; padding: 0;">
                    <li><a href="https://web.facebook.com/profile.php?id=100014477028282" style="text-decoration: none;">Facebook</a></li>
                    <li><a href="https://wa.me/082338520959" style="text-decoration: none;">WhatsApp</a></li>
                    <li><a href="https://www.instagram.com/irhamkaraman/" style="text-decoration: none;">Instagram</a></li>
                    <li><a href="https://github.com/irhamkaraman" style="text-decoration: none;">GitHub</a></li>
                    <li><a href="https://www.linkedin.com/in/lazuardi-irham-karaman-3178a3305/?originalSubdomain=id" style="text-decoration: none;">LinkedIn</a></li>
                </ul>
            </div>

            <div class="col" style="flex: 1; padding: 10px;">
                <h5 style="font-weight: bold;">Genre Buku</h5>
                <ul style="list-style-type: none; padding: 0;">
                    @foreach ($genres as $genre)
                    <li><a href="{{ route('buku.index', ['genre' => $genre->id]) }}" style="text-decoration: none;">{{ $genre->name }}</a></li>
                    @endforeach
                </ul>
            </div>

            <div class="col text-center" style="flex: 1; padding: 10px;">
                <h5 style="font-weight: bold;">Akun</h5>
                <div>
                    <a href="{{ route('login') }}" style="text-decoration: none; background-color: #007bff; color: white; padding: 10px 15px; border-radius: 5px; margin-right: 5px;">Login</a>
                    <a href="{{ route('register') }}" style="text-decoration: none; background-color: #28a745; color: white; padding: 10px 15px; border-radius: 5px;">Register</a>
                </div>
            </div>
        </div>

        <!-- Bagian Tim Kami -->
        <div class="row" style="margin-top: 20px; text-align: center;">
            <h5 style="font-weight: bold;">Tim Kami:</h5>
            <div style="margin-top: 10px;">
                <p style="margin-bottom: 0px;">Lazuardi Irham Karaman</p>
                <p style="margin-bottom: 0px;">Andika Dwi Putra</p>
                <p>Agya Gilar Cahyono</p>
            </div>
        </div>

    </div>
</footer>

<div id="footer-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="copyright">
                    <div class="row">

                        <div class="col-md-6">
                            <p>© {{ date('Y') }} All rights reserved. Coder by <a
                                    href="https://irhamkaraman.my.id/" target="_blank">Kelas B Kelompok 1</a></p>
                        </div>

                    </div>
                </div><!--grid-->

            </div><!--footer-bottom-content-->
        </div>
    </div>
</div>

@endsection
