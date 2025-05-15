<x-admin-layout>
        <div class="container-fluid">
            <div class="row"><div class="col-12 col-xl-12 m-b-10">
                    <div class="card">
                        <div class="card-header border-bottom">
                            <h4 class="card-title">@lang("Mods List")</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-dark mb-0 text-center">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>@lang("Username")</th>
                                        <th>@lang("Email")</th>
                                        <th>@lang("Privileges")</th>
                                        <th>@lang("Remove")</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        @if($user['id'] !== 1)
                                        <tr class="cursor-pointer" style="cursor: pointer;" onmouseover="this.style.backgroundColor='#1b3c66';" onmouseout="this.style.backgroundColor='unset';" onclick="location.href='{{ route('admin.moderators.edit', ['user' => $user['id']]) }}';">
                                            <th scope="row">{{ $user['id'] }}</th>
                                            <td>{{ $user['username'] }}</td>
                                            <td>{{ $user['email'] }}</td>
                                            <td>{{ $user['privilege'] }}</td>
                                            <td><x-form-button form="remove-moderator-{{ $user['id'] }}">Remove</x-form-button></td>
                                            <form method="post" action="{{ route('admin.moderators.destroy', $user['id']) }}" id="remove-moderator-{{ $user['id'] }}" class="hidden">
                                                @csrf
                                                @method('delete')
                                            </form>
                                        </tr>
                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-admin-layout>
