{{-- @extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Tab Buttons -->
    <div class="flex space-x-4 mb-6">
        <button onclick="showTab('galeri')" class="tab-button bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Galeri</button>
        <!-- Tambahkan tab lainnya di sini jika ada -->
    </div>

    <!-- Tab Content -->
    <div id="galeri" class="tab-content">
        <h2 class="text-2xl font-bold mb-4">Galeri Foto</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
            <div><img src="{{ asset('images/galeri1.png') }}" alt="Foto Galeri 1" loading="lazy" class="galeri-image w-full rounded shadow-md"></div>
            <div><img src="{{ asset('images/galeri2.png') }}" alt="Foto Galeri 2" loading="lazy" class="galeri-image w-full rounded shadow-md"></div>
            <div><img src="{{ asset('images/galeri3.png') }}" alt="Foto Galeri 3" loading="lazy" class="galeri-image w-full rounded shadow-md"></div>
            <div><img src="{{ asset('images/galeri4.png') }}" alt="Foto Galeri 4" loading="lazy" class="galeri-image w-full rounded shadow-md"></div>
            <div><img src="{{ asset('images/galeri5.png') }}" alt="Foto Galeri 5" loading="lazy" class="galeri-image w-full rounded shadow-md"></div>
            <div><img src="{{ asset('images/galeri6.png') }}" alt="Foto Galeri 6" loading="lazy" class="galeri-image w-full rounded shadow-md"></div>
            <div><img src="{{ asset('images/galeri7.png') }}" alt="Foto Galeri 7" loading="lazy" class="galeri-image w-full rounded shadow-md"></div>
            <div><img src="{{ asset('images/galeri8.png') }}" alt="Foto Galeri 8" loading="lazy" class="galeri-image w-full rounded shadow-md"></div>
            <div><img src="{{ asset('images/galeri9.png') }}" alt="Foto Galeri 9" loading="lazy" class="galeri-image w-full rounded shadow-md"></div>
            <div><img src="{{ asset('images/galeri10.png') }}" alt="Foto Galeri 10" loading="lazy" class="galeri-image w-full rounded shadow-md"></div>
            <div><img src="{{ asset('images/galeri11.png') }}" alt="Foto Galeri 11" loading="lazy" class="galeri-image w-full rounded shadow-md"></div>
            <div><img src="{{ asset('images/galeri12.png') }}" alt="Foto Galeri 12" loading="lazy" class="galeri-image w-full rounded shadow-md"></div>
            <div><img src="{{ asset('images/galeri13.png') }}" alt="Foto Galeri 13" loading="lazy" class="galeri-image w-full rounded shadow-md"></div>
            <div><img src="{{ asset('images/galeri14.png') }}" alt="Foto Galeri 14" loading="lazy" class="galeri-image w-full rounded shadow-md"></div>
            <div><img src="{{ asset('images/galeri15.png') }}" alt="Foto Galeri 15" loading="lazy" class="galeri-image w-full rounded shadow-md"></div>
            <div><img src="{{ asset('images/galeri16.png') }}" alt="Foto Galeri 16" loading="lazy" class="galeri-image w-full rounded shadow-md"></div>
            <div><img src="{{ asset('images/galeri17.png') }}" alt="Foto Galeri 17" loading="lazy" class="galeri-image w-full rounded shadow-md"></div>
            <div><img src="{{ asset('images/galeri18.png') }}" alt="Foto Galeri 18" loading="lazy" class="galeri-image w-full rounded shadow-md"></div>
            <div><img src="{{ asset('images/galeri19.png') }}" alt="Foto Galeri 19" loading="lazy" class="galeri-image w-full rounded shadow-md"></div>
            <div><img src="{{ asset('images/galeri20.png') }}" alt="Foto Galeri 20" loading="lazy" class="galeri-image w-full rounded shadow-md"></div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/galeri.css') }}">
@endpush

@push('scripts')
<script>
    function showTab(tabId) {
        // Sembunyikan semua tab
        document.querySelectorAll('.tab-content').forEach(tab => tab.classList.add('hidden'));

        // Tampilkan tab yang dipilih
        document.getElementById(tabId).classList.remove('hidden');
    }

    // Tampilkan Galeri sebagai default
    document.addEventListener('DOMContentLoaded', () => {
        showTab('galeri');
    });
</script>
@endpush --}}
