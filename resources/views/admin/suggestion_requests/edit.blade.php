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
                <h4 class="card-title"><a href="{{ route('admin.suggestion-requests') }}">@lang('Customer Messages')</a></h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col"><div>@lang('name')</div></th>
                            <th scope="col"><div>@lang('phone')</div></th>
                            <th scope="col"><div>@lang('message')</div></th>
                            <th scope="col"><div>@lang('status')</div></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">{{ $suggestionRequest['id'] }}</th>
                            <td><div>{{ $suggestionRequest['name'] }}</div></td>
                            <td><div>{{ $suggestionRequest['phone'] }}</div></td>
                            <td>
                                <div class="lg-messages">
                                    {{ $suggestionRequest['message'] }}
                                </div>
                            </td>
                            <td><div>{{ $suggestionRequest['status'] }}</div></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <div class="admin-options flex-col">
            <form method="POST" action="{{ route('admin.suggestion-requests.update', ['suggestionRequest' => $suggestionRequest->id]) }}">
                @csrf
                @method('PATCH')

                <label class="btn-radio">@lang('Update Status'):
                    <input type="radio" name="status" value="processed">
                    <span class="btn btn-secondary mr-4 {{ $suggestionRequest['status'] == 'processed' ? 'hidden-item' : '' }}">@lang('Processed')</span>
                </label>

                <label class="btn-radio">
                    <input type="radio" name="status" value="archived">
                    <span class="btn btn-secondary mr-4 {{ $suggestionRequest['status'] == 'archived' ? 'hidden-item' : '' }}">@lang('Archive')</span>
                </label>
                <div>
                    {{--                <a href="/admin/suggestion-requests" class="btn btn-warning mt-5 mr-5">Cancle</a>--}}
                    <button type="submit" class="btn btn-success mt-5">@lang('Confirm')</button>
                </div>
            </form></div>
    </div>
</x-admin-layout>
