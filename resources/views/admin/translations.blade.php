<x-admin-layout>
    <h2>@lang("Translations")</h2>

    <form id="translations-form" action="{{ route('admin.translations.update') }}" method="POST">
        @csrf
        @method('patch')

        <!-- Hidden input for deleted keys -->
        <input type="hidden" id="deleted-keys" name="deleted_keys" value="">

        <table class="translationsTable">
            <thead>
            <tr>
                <th>Key (English)</th>
                <th></th>
                <th>Value (Arabic)</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody id="translations-table-body">
            @foreach($displayTranslations as $key => $value)
                <tr data-key="{{ base64_encode($key) }}"> <!-- Encoding to handle special characters -->
                    <td>
                        {{ $key }}
                        <input type="hidden" name="translations[{{ $key }}][key]" value="{{ $key }}">
                    </td>
                    <td>=></td>
                    <td>
                        <input type="text" name="translations[{{ $key }}][value]" value="{{ $value }}" class="form-control my-1">
                    </td>
                    <td>
                        <button type="button" class="delete-row-button" data-key="{{ base64_encode($key) }}">🗑️</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <button type="submit" class="btn btn-primary">Update Translations</button>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const tableBody = document.getElementById('translations-table-body');
            const deletedKeysInput = document.getElementById('deleted-keys');
            const deletedKeys = new Set();

            tableBody.addEventListener('click', (event) => {
                if (event.target.classList.contains('delete-row-button')) {
                    const rowKey = event.target.dataset.key;

                    // Add the key to the deleted keys set
                    deletedKeys.add(rowKey);

                    // Update the hidden input value
                    deletedKeysInput.value = Array.from(deletedKeys).join(',');

                    // Remove the row from the DOM
                    const row = document.querySelector(`tr[data-key="${rowKey}"]`);
                    if (row) {
                        row.remove();
                    }
                }
            });
        });
    </script>
</x-admin-layout>

<style>
    .translationsTable thead tr th {
        width: 48%;
    }
    .translationsTable thead tr th:nth-child(2) {
        width: 4%;
    }
    .translationsTable tbody tr td:nth-child(2) {
        text-align: center;
        color: #666;
    }
    .delete-row-button {
        cursor: pointer;
        border: none;
        background: transparent;
        color: red;
        font-size: 1rem;
    }
</style>
