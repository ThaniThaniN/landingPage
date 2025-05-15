<x-admin-layout>
    <div class="col-12 col-xl-12 m-b-10">
        <div class="card">
            <div class="card-header border-bottom d-flex justify-content-between">
                <h4 class="card-title">@lang('Product Requests')</h4>
                <div class="form-group row">
                    <label class="col-5 col-form-label">@lang('Filter by status'):</label>
                    <div class="col-7">
                        <select class="form-control" id="status-filter">
                            <option value="pending">@lang('Pending')</option>
                            <option value="processed">@lang('Processed')</option>
                            <option value="archived">@lang('Archived')</option>
                        </select>
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
                            <th scope="col">@lang('Business Name')</th>
                            <th scope="col">@lang('Branches')</th>
                            <th scope="col">@lang('Message')</th>
                            <th scope="col">@lang('Status')</th>
                        </tr>
                        </thead>
                        <tbody id="productRequestTable">
                        @foreach($pendingRequests as $productRequest)
                            <tr>
                                <th scope="row"><a href="{{ route('admin.product-requests.edit', $productRequest->id) }}">{{ $productRequest->id }}</a></th>
                                <td><a href="{{ route('admin.product-requests.edit', $productRequest->id) }}">{{ $productRequest->name }}</a></td>
                                <td><a href="{{ route('admin.product-requests.edit', $productRequest->id) }}">{{ $productRequest->phone }}</a></td>
                                <td><a href="{{ route('admin.product-requests.edit', $productRequest->id) }}">{{ $productRequest->bName }}</a></td>
                                <td><a href="{{ route('admin.product-requests.edit', $productRequest->id) }}">{{ $productRequest->branches }}</a></td>
                                <td>
                                    <div style="max-height:100px; overflow-y:hidden;">
                                        <a href="{{ route('admin.product-requests.edit', $productRequest->id) }}">{{ $productRequest->message }}</a>
                                    </div>
                                </td>
                                <td><a href="{{ route('admin.product-requests.edit', $productRequest->id) }}">{{ __($productRequest->status) }}</a></td>
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
        $editRouteTemplate = route('admin.product-requests.edit', ['productRequest' => '__ID__']);
    @endphp

    <script>
        const statusTranslations = @json($statusTranslations);
        const editRouteTemplate = @json($editRouteTemplate);
        document.addEventListener('DOMContentLoaded', () => {
            const statusFilter = document.getElementById('status-filter');
            const tableBody = document.getElementById('productRequestTable');

            const data = {
                pending: @json($pendingRequests),
                processed: @json($processedRequests),
                archived: @json($archivedRequests),
            };

            function updateTable(status) {
                const requests = data[status] || [];
                tableBody.innerHTML = requests.map(request => `
                    <tr>
                        <th scope="row"><a href="${editRouteTemplate.replace('__ID__', request.id)}">${request.id}</a></th>
                        <td><a href="${editRouteTemplate.replace('__ID__', request.id)}">${request.name}</a></td>
                        <td><a href="${editRouteTemplate.replace('__ID__', request.id)}">${request.phone}</a></td>
                        <td><a href="${editRouteTemplate.replace('__ID__', request.id)}">${request.bName}</a></td>
                        <td><a href="${editRouteTemplate.replace('__ID__', request.id)}">${request.branches}</a></td>
                        <td>
                            <div style="max-height:100px; overflow-y:hidden;">
                                <a href="${editRouteTemplate.replace('__ID__', request.id)}">${request.message}</a>
                            </div>
                        </td>
                        <td><a href="${editRouteTemplate.replace('__ID__', request.id)}">${statusTranslations[request.status] || request.status}</a></td>
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
