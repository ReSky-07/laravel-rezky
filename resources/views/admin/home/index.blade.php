@include('admin_partials.header')
@include('admin_partials.navigation')
@include('admin_partials.sidebar')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Home Content</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Home</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Home Content Table
                    <a href="{{ route('admin.home.create') }}" class="btn btn-primary btn-sm float-end">Add New</a>
                </div>
                <div class="card-body">
                    <table id="datatablesSimple" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Photo</th>
                                <th>Tagline</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($homes as $home)
                            <tr>
                                <td>
                                    <img src="{{ asset('storage/' . $home->photo) }}" alt="Photo" style="width: 100px; height: auto;">
                                </td>
                                <td>{{ $home->tagline }}</td>
                                <td>{{ Str::limit($home->description, 50) }}</td>
                                <td>
                                    <a href="{{ route('admin.home.edit', $home->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('admin.home.destroy', $home->id) }}" method="POST" class="delete-form" style="display:inline;">
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