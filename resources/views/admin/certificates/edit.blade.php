@include('admin_partials.header')
@include('admin_partials.navigation')
@include('admin_partials.sidebar')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Edit Certificate</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('admin.certificates.index') }}">Certificates</a></li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>

            <div class="card mb-4">
                <div class="card-body">
                    <form action="{{ route('admin.certificates.update', $certificate->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $certificate->title }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="issued_at" class="form-label">Issued At</label>
                            <input type="date" class="form-control" id="issued_at" name="issued_at" value="{{ $certificate->issued_at }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="issued_by" class="form-label">Issued By</label>
                            <input type="text" class="form-control" id="issued_by" name="issued_by" value="{{ $certificate->issued_by }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="file" class="form-label">Certificate File (PDF)</label>
                            <input type="file" class="form-control" id="file" name="file" accept="application/pdf">
                            <small>Current File: <a href="{{ asset('storage/' . $certificate->file) }}" target="_blank">View</a></small>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="5">{{ $certificate->description }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('admin.certificates.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </main>
    @include('admin_partials.footer')
</div>
