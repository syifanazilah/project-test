@extends('layouts.navigation')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data tickets - SantriKoding.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('tickets.create') }}" class="btn btn-md btn-success mb-3">Add Ticket</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Message</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Priority</th>
                                    <th scope="col">Label</th>
                                    <th scope="col" style="width: 20%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($tickets as $ticket)
                                    <tr>
                                        <td class="text-center">
                                            <img src="{{ asset('/storage/tickets/'.$ticket->image) }}" class="rounded" style="width: 150px">
                                        </td>
                                        <td>{{ $ticket->title }}</td>
                                        <td>{{ $ticket->message }}</td>
                                        <td>{{ $ticket->status }}</td>
                                        <td>{{ $ticket->category->name }}</td>
                                        <td>{{ $ticket->priority->name }}</td>
                                        <td>{{ $ticket->label->name }}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('tickets.destroy', $ticket->id) }}" method="POST">
                                                <a href="{{ route('tickets.show', $ticket->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                                <a href="{{ route('tickets.edit', $ticket->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">DELETE</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Tickets unavailable.
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $tickets->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        //message with sweetalert
        @if(session('success'))
            Swal.fire({
                icon: "success",
                title: "BERHASIL",
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @elseif(session('error'))
            Swal.fire({
                icon: "error",
                title: "GAGAL!",
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif

    </script>

</body>
</html>