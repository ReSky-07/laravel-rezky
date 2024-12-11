@include('admin_partials.header')
@include('admin_partials.navigation')
@include('admin_partials.sidebar')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Certificates</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Certificates</li>
            </ol>

            @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Certificate List
                    <a href="{{ route('admin.certificates.create') }}" class="btn btn-primary btn-sm float-end">
                        <i class="fas fa-plus"></i> Add New Certificate
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="datatablesSimple" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Issued At</th>
                                    <th>Issued By</th>
                                    <th>File</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($certificates as $index => $certificate)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $certificate->title }}</td>
                                    <td>{{ $certificate->issued_at }}</td>
                                    <td>{{ $certificate->issued_by }}</td>
                                    <td>
                                        <a href="{{ asset('storage/' . $certificate->file) }}" target="_blank" class="btn btn-sm btn-info">
                                            View PDF
                                        </a>
                                    </td>
                                    <td>{{ $certificate->description ?? '-' }}</td>
                                    <td>
                                        <a href="{{ route('admin.certificates.edit', $certificate->id) }}" class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form action="{{ route('admin.certificates.destroy', $certificate->id) }}" method="POST" class="delete-form" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger btn-sm delete-btn">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>


    @if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: "{{ session('success') }}",
            timer: 3000,
            showConfirmButton: false,
        });
    </script>
    @endif


    <script>
         document.addEventListener('DOMContentLoaded', function() {
            // Gunakan event delegation untuk menangani klik pada tombol delete
            document.querySelector('table').addEventListener('click', function(event) {
                // Cek apakah elemen yang diklik adalah tombol delete
                if (event.target.classList.contains('delete-btn')) {
                    event.preventDefault();
                    const form = event.target.closest('.delete-form');

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                }
            });
        });
    </script>


    @include('admin_partials.footer')
</div>