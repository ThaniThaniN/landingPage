<x-admin-layout>
    <div class="col-12 col-xl-12 m-b-10">
        <div class="card">
            <div class="card-header border-bottom d-flex justify-content-between">
                <h4 class="card-title">@lang('Customer Messages')</h4>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-5 col-form-label">@lang('Filter by status'):</label>
                        <div class="col-6">
                            <select class="form-control" id="status-filter">
                                <option value="pending">@lang('Pending')</option>
                                <option value="processed">@lang('Processed')</option>
                                <option value="archived">@lang('Archived')</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">@lang('Name')</th>
                            <th scope="col">@lang('Phone')</th>
                            <th scope="col">@lang('Message')</th>
                            <th scope="col">@lang('Status')</th>
                        </tr>
                        </thead>
                        <tbody id="suggestionRequestTable">
                        @foreach($pendingRequests as $suggestionRequest)
                            <tr>
                                <th scope="row"><a href="{{ route('admin.suggestion-requests.edit', $suggestionRequest->id) }}">{{ $suggestionRequest->id }}</a></th>
                                <td><a href="{{ route('admin.suggestion-requests.edit', $suggestionRequest->id) }}">{{ $suggestionRequest->name }}</a></td>
                                <td><a href="{{ route('admin.suggestion-requests.edit', $suggestionRequest->id) }}">{{ $suggestionRequest->phone }}</a></td>
                                <td><a href="{{ route('admin.suggestion-requests.edit', $suggestionRequest->id) }}">{{ $suggestionRequest->message }}</a></td>
                                <td><a href="{{ route('admin.suggestion-requests.edit', $suggestionRequest->id) }}">{{ __($suggestionRequest->status) }}</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @php
        $statusTranslations = [
            'pending' => __('Pending'),
            'processed' => __('Processed'),
            'archived' => __('Archived'),
        ];
    @endphp

    <script>
        const statusTranslations = @json($statusTranslations);
        document.addEventListener('DOMContentLoaded', () => {
            const statusFilter = document.getElementById('status-filter');
            const tableBody = document.getElementById('suggestionRequestTable');

            const data = {
                pending: @json($pendingRequests),
                processed: @json($processedRequests),
                archived: @json($archivedRequests),
            };

            function updateTable(status) {
                const requests = data[status] || [];
                tableBody.innerHTML = requests.map(request => `
                    <tr>
                        <th scope="row"><a href="${@json(route('admin.suggestion-requests.edit', 'ID')).replace('ID', request.id)}">${request.id}</a></th>
                        <td><a href="${@json(route('admin.suggestion-requests.edit', 'ID')).replace('ID', request.id)}">${request.name}</a></td>
                        <td><a href="${@json(route('admin.suggestion-requests.edit', 'ID')).replace('ID', request.id)}">${request.phone}</a></td>
                        <td><a href="${@json(route('admin.suggestion-requests.edit', 'ID')).replace('ID', request.id)}">${request.message}</a></td>
                        <td><a href="${@json(route('admin.suggestion-requests.edit', 'ID')).replace('ID', request.id)}">${statusTranslations[request.status] || request.status}</a></td>
                    </tr>
                `).join('');
            }

            statusFilter.addEventListener('change', (e) => {
                updateTable(e.target.value);
            });

            updateTable('pending');
        });
    </script>
</x-admin-layout>
