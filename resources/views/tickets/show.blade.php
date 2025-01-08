<x-app-layout>
    <div class="container mx-auto my-5 px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Bagian Kiri (Gambar) -->
            <div class="col-span-1">
                <div class="bg-white border rounded-lg shadow-md">
                    <div class="p-4">
                        <img src="{{ asset('/storage/tickets/'.$ticket->image) }}" 
                             class="rounded-lg w-full object-cover">
                    </div>
                </div>
            </div>
            
            <!-- Bagian Kanan (Informasi) -->
            <div class="col-span-1 md:col-span-2">
                <div class="bg-white border rounded-lg shadow-md">
                    <div class="p-6">
                        <h3 class="text-2xl font-semibold text-gray-800">{{ $ticket->title }}</h3>
                        <hr class="my-4 border-gray-300" />
                        <p class="text-gray-700"><strong>Message:</strong> {{ $ticket->message }}</p>
                        <p class="text-gray-700"><strong>Status:</strong> {{ $ticket->status }}</p>
                        <p class="text-gray-700"><strong>Category:</strong> {{ $ticket->category->name }}</p>
                        <p class="text-gray-700"><strong>Priority:</strong> {{ $ticket->priority->name }}</p>
                        <p class="text-gray-700"><strong>Label:</strong> {{ $ticket->labels->name }}</p>
                        <p class="text-gray-700"><strong>Time:</strong> {{ $ticket->created_at }}</p>

                        <div class="flex justify-between items-center">
                            <a href="{{ route('admin.dashboard') }}" class="px-6 py-2 mt-4 bg-gray-500 text-white rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50">
                                Back
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
