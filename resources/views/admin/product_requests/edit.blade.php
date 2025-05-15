<style>
    table tbody tr td div,
    table thead tr th div{
        padding: 0 20px !important;
    }

    .lg-messages {
        width: 250px !important;
    }

    @media (min-width: 968px) {
        .lg-messages {
            width: 500px !important;
        }
    }
</style>
<x-admin-layout>
    <div class="col-12 col-xl-12 m-b-10">
        <div class="card">
            <div class="card-header border-bottom">
                <h4 class="card-title"><a href="{{ route('admin.product-requests') }}">@lang('Product Requests')</a></h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col"><div>@lang('name')</div></th>
                            <th scope="col"><div>@lang('phone')</div></th>
                            <th scope="col"><div>@lang('Business Name')</div></th>
                            <th scope="col"><div>@lang('Branches')</div></th>
                            <th scope="col"><div>@lang('message')</div></th>
                            <th scope="col"><div>@lang('status')</div></th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">{{ $productRequest['id'] }}</th>
                                <td><div>{{ $productRequest['name'] }}</div></td>
                                <td><div>{{ $productRequest['phone'] }}</div></td>
                                <td><div>{{ $productRequest['bName'] }}</div></td>
                                <td><div>{{ $productRequest['branches'] }}</div></td>
                                <td>
                                    <div class="lg-messages">
                                        {{ $productRequest['message'] }}
                                    </div>
                                </td>
                                <td><div>{{ __($productRequest['status']) }}</div></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <div class="admin-options flex-col">
            <form method="POST" action="{{ route('admin.product-requests.update', ['productRequest' => $productRequest->id]) }}">
                @csrf
                @method('PATCH')

                <label class="btn-radio">@lang('Update Status'):
                    <input type="radio" name="status" value="processed">
                    <span class="btn btn-secondary mr-4 {{ $productRequest['status'] == 'processed' ? 'hidden-item' : '' }}">@lang('Processed')</span>
{{--                    <span class="hidden-item">@lang('Processed')</span>--}}

                </label>

                <label class="btn-radio">
                    <input type="radio" name="status" value="archived">
                    <span class="btn btn-secondary mr-4 {{ $productRequest['status'] == 'archived' ? 'hidden-item' : '' }}">@lang('Archive')</span>
                </label>
                <div>
{{--                <a href="/admin/product-requests" class="btn btn-warning mt-5 mr-5">Cancle</a>--}}
                <button type="submit" class="btn btn-success mt-5">@lang('Confirm')</button>
                </div>
        </div>
    </div>
</x-admin-layout>
