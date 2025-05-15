<x-admin-layout>
    <x-form-label>Edit Moderator</x-form-label>

    <x-form method="post" action="{{ route('admin.moderators.update', ['user' => $user->id]) }}">
        @csrf
        @method('patch')

        <x-form-group style="width: 50%;">
            <x-form-label for="username">Username:</x-form-label>
            <x-form-input name="username" id="username" required placeholder="Mazen" value="{{ $user->username }}"></x-form-input>
            <x-form-input-error name="username"></x-form-input-error>
        </x-form-group>

        <x-form-group style="width: 50%;">
            <x-form-label for="email">Email:</x-form-label>
            <x-form-input name="email" id="email" required placeholder="Mazen@example.com" value="{{ $user->email }}"></x-form-input>
            <x-form-input-error name="email"></x-form-input-error>
        </x-form-group>

        <x-form-group style="width: 50%;">
            <x-form-label for="privilege">Privileges:</x-form-label>
            <div style="display: flex; flex-direction: column; margin-left: 1rem">
                @php
                    $privileges = json_decode($user->privilege, true) ?? [];
                @endphp
                <label>
                    <input type="checkbox" name="privilege[]" value="dashboard" {{ in_array('dashboard', $privileges) ? 'checked' : '' }}> Dashboard
                </label>
                <label>
                    <input type="checkbox" name="privilege[]" value="edit-ui" {{ in_array('edit-ui', $privileges) ? 'checked' : '' }}> Edit UI
                </label>
                <label>
                    <input type="checkbox" name="privilege[]" value="product-requests" {{ in_array('product-requests', $privileges) ? 'checked' : '' }}> Edit Product Requests
                </label>
                <label>
                    <input type="checkbox" name="privilege[]" value="suggestion-requests" {{ in_array('suggestion-requests', $privileges) ? 'checked' : '' }}> Edit Customer Messages
                </label>
                <label>
                    <input type="checkbox" name="privilege[]" value="moderators" {{ in_array('moderators', $privileges) ? 'checked' : '' }}> Edit Reports (Careful)
                </label>
                <label>
                    <input type="checkbox" name="privilege[]" value="translations" {{ in_array('translations', $privileges) ? 'checked' : '' }}> Edit Translations
                </label>
            </div>
            <x-form-input-error name="privilege"></x-form-input-error>
        </x-form-group>

        <x-form-group style="width: 50%;">
            <x-form-button>Update</x-form-button>
        </x-form-group>
    </x-form>
</x-admin-layout>
