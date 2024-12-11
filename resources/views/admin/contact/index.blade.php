@include('admin_partials.header')
@include('admin_partials.navigation')
@include('admin_partials.sidebar')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Contacts</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Contact Management</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Contact Table
                </div>
                <div class="card-body">
                    <table id="datatablesSimple" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Message</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($contact as $contact)
                            <tr>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ Str::limit($contact->message, 50) }}</td>
                                <td>{{ $contact->created_at->timezone('Asia/Jakarta')->format('d M Y, H:i') }}</td>
                                <td>
                                    <form action="{{ route('admin.contact.destroy', $contact->id) }}" method="POST" class="delete-form" style="display:inline;">
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

    <!-- Success Alert -->
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

    <!-- Delete Confirmation -->
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