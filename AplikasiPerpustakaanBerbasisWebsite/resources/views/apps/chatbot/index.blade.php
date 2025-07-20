@extends('layouts.app')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Chatbot</h4>

        <div class="row">
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Akses Chatbot</h5>
                        <small class="text-muted float-end">Ini adalah halaman untuk mengakses chatbot</small>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('chatbot.update') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label">Name (nama chatbot)</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ old('name', $chatbot->name ?? '') }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Message (pesan awal yang akan di kirim oleh
                                    chatbot)</label>
                                <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="3">{{ old('message', $chatbot->message ?? '') }}</textarea>
                                @error('message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Prohibition (list larangan yang tidak boleh di kirim oleh
                                    pengguna)</label>
                                <textarea class="form-control @error('prohibition') is-invalid @enderror" id="prohibition" name="prohibition"
                                    rows="3">{{ old('prohibition', $chatbot->prohibition ?? '') }}</textarea>
                                @error('prohibition')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="api_gemini" class="form-label">API Key (kunci API yang di gunakan oleh
                                    chatbot)</label>
                                <input type="text" class="form-control @error('api_gemini') is-invalid @enderror"
                                    id="api_gemini" name="api_gemini"
                                    value="{{ old('api_gemini', $chatbot->api_gemini ?? '') }}">
                                @error('api_gemini')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        CKEDITOR.replace('message');
        CKEDITOR.replace('prohibition');
    </script>
@endsection
