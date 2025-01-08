<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User Dashboard') }}
        </h2>
    </x-slot>

    <!-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Selamat Datang di Dashboard User!") }}
                </div>
            </div>
        </div>
    </div> -->

    <div class="container mx-auto mt-5">
        <div class="shadow-lg rounded-lg bg-white p-6 mx-4">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-xl font-bold">Tickets</h1>
                <a href="{{ route('tickets.create') }}" 
                class="px-4 py-2 bg-green-500 text-white text-sm font-medium rounded hover:bg-green-600">
                    ADD TICKET
                </a>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-300">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase border-b">
                                Image
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase border-b">
                                Title
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase border-b">
                                Message
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase border-b">
                                Status
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase border-b">
                                Category
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase border-b">
                                Priority
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase border-b">
                                Label
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($tickets as $ticket)
                            <tr>
                                <td class="text-center">
                                    <img src="{{ asset('/storage/tickets/'.$ticket->image) }}" class="rounded" style="width: 100px">
                                </td>
                                <td class="px-6 py-4 border-b">{{ $ticket->title }}</td>
                                <td class="px-6 py-4 border-b">{{ $ticket->message }}</td>
                                <td class="px-6 py-4 border-b">{{ $ticket->status }}</td>
                                <td class="px-6 py-4 border-b">{{ $ticket->category->name }}</td>
                                <td class="px-6 py-4 border-b">{{ $ticket->priority->name }}</td>
                                <td class="px-6 py-4 border-b">{{ $ticket->labels->name }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-red-500 py-4">
                                    Tickets unavailable.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                {{ $tickets->links() }}
            </div>
        </div>
        <script>
            //message with sweetalert
            @if(session('success'))
                Swal.fire({
                    icon: "success",
                    title: "Success!",
                    text: "{{ session('success') }}",
                    showConfirmButton: false,
                    timer: 2000
                });
            @elseif(session('error'))
                Swal.fire({
                    icon: "error",
                    title: "Fail!",
                    text: "{{ session('error') }}",
                    showConfirmButton: false,
                    timer: 2000
                });
            @endif
        </script>
    </div>
</x-app-layout>
