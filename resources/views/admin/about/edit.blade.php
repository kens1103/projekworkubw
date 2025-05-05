@extends('layouts.admin.app')

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
    .accordion-item {
        margin-bottom: 1rem; /* Memberikan jarak antar accordion */
    }
    .accordion-button {
        border-radius: 0.375rem;
    }
</style>

@section('content')
<h1>Edit Tentang Kami</h1>
<a href="{{ url('tentang') }}" class="btn btn-success mb-3">
    <i class="fa-solid fa-eye"></i> Lihat di Tentang
</a>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form action="{{ route('about.update') }}" method="POST" id="updateForm">
    @csrf
    @method('PUT')

    <div class="accordion mb-3" id="accordionAbout">
        <!-- Judul -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTitle">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTitle" aria-expanded="false" aria-controls="collapseTitle">
                    Judul
                </button>
            </h2>
            <div id="collapseTitle" class="accordion-collapse collapse" aria-labelledby="headingTitle" data-bs-parent="#accordionAbout">
                <div class="accordion-body">
                    <input type="text" name="title" class="form-control" value="{{ $about->title }}" required>
                </div>
            </div>
        </div>

        <!-- Visi -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingVisi">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseVisi" aria-expanded="false" aria-controls="collapseVisi">
                    Visi
                </button>
            </h2>
            <div id="collapseVisi" class="accordion-collapse collapse" aria-labelledby="headingVisi" data-bs-parent="#accordionAbout">
                <div class="accordion-body">
                    <textarea name="visi" class="form-control" rows="4" required>{{ $about->visi }}</textarea>
                </div>
            </div>
        </div>

        <!-- Misi -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingMisi">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMisi" aria-expanded="false" aria-controls="collapseMisi">
                    Misi
                </button>
            </h2>
            <div id="collapseMisi" class="accordion-collapse collapse" aria-labelledby="headingMisi" data-bs-parent="#accordionAbout">
                <div class="accordion-body">
                    <textarea name="misi" class="form-control" rows="4" required>{{ $about->misi }}</textarea>
                </div>
            </div>
        </div>
    </div>

    <button type="button" class="btn btn-primary mt-3" onclick="openConfirmationModal()">Update</button>
</form>

<!-- Modal Konfirmasi -->
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
<script>
    // Inisialisasi dropdown Bootstrap di sidebar
    document.addEventListener('DOMContentLoaded', function () {
        const dropdownElements = document.querySelectorAll('.dropdown-toggle');
        dropdownElements.forEach(function(dropdownElement) {
            new bootstrap.Dropdown(dropdownElement);
        });
    });
</script>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
@endsection
