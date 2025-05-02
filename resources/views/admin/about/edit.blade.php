@extends('partials.sidebar')
<style>
        body {
            background-color: #f5f7fa;
        }
        .sidebar {
            height: 100vh;
            background: #343a40;
            color: white;
            padding-top: 20px;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px 20px;
        }
        .sidebar a:hover {
            background: #495057;
        }
        .content {
            padding: 30px;
        }
        .card {
            border-radius: 12px;
        }
    </style>
@section('content')
    <h1>Edit Tentang Kami</h1>
    <a href="{{ url('tentang') }}" class="btn btn-success">
        <i class="fa-solid fa-eye"></i> Lihat di tentang
    </a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('about.update') }}" method="POST" id="updateForm">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="title">Judul</label>
            <input type="text" name="title" id="title" value="{{ $about->title }}" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label for="visi">Visi</label>
            <textarea name="visi" id="visi" class="form-control">{{ $about->visi }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label for="misi">Misi</label>
            <textarea name="misi" id="misi" class="form-control">{{ $about->misi }}</textarea>
        </div>

        <button type="button" class="btn btn-primary" onclick="openConfirmationModal()">Update</button>
    </form>

    <!-- Modal Konfirmasi Update -->
    <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="confirmationModalLabel"><i class="fa-solid fa-exclamation-circle"></i> Konfirmasi Update</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <p class="fw-bold">Apakah perubahan sudah benar?</p>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fa-solid fa-times"></i> Batal
                    </button>
                    <button type="button" class="btn btn-primary" onclick="submitUpdateForm()">
                        <i class="fa-solid fa-check"></i> Update
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openConfirmationModal() {
            const confirmationModal = new bootstrap.Modal(document.getElementById('confirmationModal'));
            confirmationModal.show();
        }

        function submitUpdateForm() {
            document.getElementById('updateForm').submit();
        }
    </script>

    <!-- Bootstrap JS (if not already included) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FontAwesome (for icons) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
@endsection