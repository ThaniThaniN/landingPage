<x-admin-layout>
    <x-form-label>@lang("New Moderator")</x-form-label>

    <x-form method="post" action="{{ route('admin.moderators.create') }}">
        @csrf
        <x-form-group style="width: 50%;">
            <x-form-label for="username">@lang("Username"):</x-form-label>
            <x-form-input name="username" id="username" required placeholder="Mazen" value="{{ old('username') }}"></x-form-input>
            <x-form-input-error name="username"></x-form-input-error>
        </x-form-group>
        <x-form-group style="width: 50%;">
            <x-form-label for="email">@lang("Email"):</x-form-label>
            <x-form-input name="email" id="email" required placeholder="Mazen@example.com" value="{{ old('email') }}"></x-form-input>
            <x-form-input-error name="email"></x-form-input-error>
        </x-form-group>
        <x-form-group style="width: 50%;">
            <x-form-label for="privilege">@lang("Privileges"):</x-form-label>
            <div style="display: flex; flex-direction: column; margin-left: 1rem">
                <label><input type="checkbox" name="privilege[]" value="dashboard"> @lang("Dashboard")</label>
                <label><input type="checkbox" name="privilege[]" value="edit-ui"> @lang("Edit UI")</label>
                <label><input type="checkbox" name="privilege[]" value="product-requests"> @lang("Edit Product Requests")</label>
                <label><input type="checkbox" name="privilege[]" value="suggestion-requests"> @lang("Edit Customer Messages")</label>
                <label><input type="checkbox" name="privilege[]" value="moderators"> @lang("Edit Reports (Careful)")</label>
                <label><input type="checkbox" name="privilege[]" value="translations"> @lang("Edit Translations")</label>
            </div>
            <x-form-input-error name="privilege"></x-form-input-error>
        </x-form-group>
        <x-form-group style="width: 50%;">
            <x-form-label for="password">@lang("Password"):</x-form-label>
            <x-form-input name="password" id="password" required placeholder="********" value="{{ old('password') }}"></x-form-input>
            <x-form-input-error name="password"></x-form-input-error>
        </x-form-group>
        <x-form-group style="width: 50%;">
            <x-form-label for="password_confirmation">@lang("Retype Password"):</x-form-label>
            <x-form-input name="password_confirmation" id="password_confirmation" required placeholder="********" value="{{ old('password_confirmation') }}"></x-form-input>
            <x-form-input-error name="password_confirmation"></x-form-input-error>
        </x-form-group>
        <x-form-group style="width: 50%;">
            <x-form-button>@lang('Create')</x-form-button>
        </x-form-group>

    </x-form>
</x-admin-layout>
