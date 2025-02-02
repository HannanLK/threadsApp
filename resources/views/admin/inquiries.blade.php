<x-guest-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">Manage Inquiries</h1>

        <!-- Inquiry Table -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase">Inquiry ID</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase">Name</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase">Email</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase">Contact Number</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase">Subject</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase">Message</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase">Status</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase">Status History</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($inquiries as $inquiry)
                        <tr>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $inquiry->_id }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $inquiry->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $inquiry->email }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $inquiry->contactNumber }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $inquiry->subject }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $inquiry->message }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">
                                <span class="px-2 py-1 text-xs font-semibold rounded-full 
                                    {{ $inquiry->status === 'Pending' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                    {{ $inquiry->status === 'In Progress' ? 'bg-blue-100 text-blue-800' : '' }}
                                    {{ $inquiry->status === 'Resolved' ? 'bg-green-100 text-green-800' : '' }}">
                                    {{ $inquiry->status }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-700">
                                <ul>
                                    @foreach ($inquiry->statusHistory as $history)
                                        <li>
                                            <span class="font-semibold">{{ $history['status'] }}</span> - 
                                            <span class="text-gray-500">{{ \Carbon\Carbon::parse($history['changedAt'])->format('M d, Y H:i') }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-700">
                                <select class="status-select bg-white border border-gray-300 rounded-md px-2 py-1 text-sm"
                                        data-id="{{ $inquiry->_id }}">
                                    <option value="Pending" {{ $inquiry->status === 'Pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="In Progress" {{ $inquiry->status === 'In Progress' ? 'selected' : '' }}>In Progress</option>
                                    <option value="Resolved" {{ $inquiry->status === 'Resolved' ? 'selected' : '' }}>Resolved</option>
                                </select>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- JavaScript to Handle Status Updates -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const statusSelects = document.querySelectorAll('.status-select');

            statusSelects.forEach(select => {
                select.addEventListener('change', function () {
                    const inquiryId = this.getAttribute('data-id');
                    const newStatus = this.value;

                    // Send a PUT request to update the status
                    fetch(`/inquiries/${inquiryId}/status`, {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({ status: newStatus })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.message) {
                            alert(data.message);
                            window.location.reload(); // Reload the page to reflect changes
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Failed to update status.');
                    });
                });
            });
        });
    </script>
</x-guest-layout>