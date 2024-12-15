<x-admin-layout>

    <div class="edit-container">
        <div class="alert alert-danger col-lg-8 col-md-12 col-xs-12" role="alert">
            @lang("Changes won't take effect unless you click 'Update' at the bottom of this page")
        </div>
        <div class="alert alert-danger col-lg-8 col-md-12 col-xs-12" role="alert">
            @lang('Fields Must be filled in English and then translated to Arabic')
        </div>
        <div class="card p-2">
            <x-form method="post" action="{{ route('admin.update-section', ['section' => $pageData['id']]) }}">
                @csrf
                @method('patch')
                <x-form-group>
                    <x-form-group>
                        <x-form-label>@lang('Section Title')</x-form-label>
                        <x-form-input name="title" value="{{ ($pageData['title']) ?? '' }}" required></x-form-input>
                        <x-form-input-error name="title"></x-form-input-error>
                    </x-form-group>
                    <x-form-group>
                        <x-form-label>@lang('Section Text')</x-form-label>
                        <x-form-input name="text" value="{{ ($pageData['text']) ?? 'Default Text' }}"></x-form-input>
                        <x-form-input-error name="text"></x-form-input-error>
                    </x-form-group>
                    @if($pageData['name'] === 'video' || $pageData['name'] === 'business-plan')
                    <x-form-group>
                        <x-form-label>@lang('Section Link')</x-form-label>
                        <x-form-input name="link" value="{{ ($pageData['link']) ?? 'Default link' }}" required></x-form-input>
                        <x-form-input-error name="link"></x-form-input-error>
                    </x-form-group>
{{--                    <x-form-group>--}}
{{--                        <x-form-label>YouTube Thumbnail</x-form-label>--}}
{{--                        <div class="custom-file">--}}
{{--                            <x-form-label class="custom-file-label">Click to choose a photo</x-form-label>--}}
{{--                            <x-form-input type="file" class="custom-file-input" name="thumbnail" required></x-form-input>--}}
{{--                            <x-form-input-error name="link" ></x-form-input-error>--}}
{{--                        </div>--}}
{{--                    </x-form-group>--}}
                    @endif
                    <x-form-group>
                        <x-form-button>@lang('Update Status')</x-form-button>
                    </x-form-group>
                </x-form-group>
            </x-form>
        </div>
        @if($pageData['name'] !== 'video')
            <h2>@lang('Section Cards')</h2>
            @if($pageData['cards'])
                <x-form method="post" action="{{ route('admin.cards.updateMultiple', ['sectionId' => $pageData['id']]) }}">
                    @csrf
                    @method('patch')

                    @php $i = 0 @endphp
                    @foreach($pageData['cards'] as $cardId)
                        {{-- Ensure the card exists in $cardsData by checking it --}}
                        @if(isset($cardsData[$cardId]) && $cardId != 15 && $cardId != 10  && $cardId != 11)
                            <div class="card p-2">
                                <h2>@lang('Card') {{ ++$i }}</h2>
                                <x-form-group class="w-100">
                                    <x-form-label>@lang('Title') {{ $i }}</x-form-label>
                                    <x-form-input name="title[{{ $cardId }}]" value="{{ $cardsData[$cardId]['title'] }}" required></x-form-input>
                                    <x-form-input-error name="title.{{ $cardId }}"></x-form-input-error>

                                    <hr class="w-100">
                                    <x-form-label>@lang('Text') {{ $i }}</x-form-label>
                                    <x-form-input name="text[{{ $cardId }}]" value="{{ $cardsData[$cardId]['text'] }}"></x-form-input>
                                    <x-form-input-error name="text.{{ $cardId }}"></x-form-input-error>
                                </x-form-group>
                            </div>
                        @elseif($cardId === 15)
                            <div class="card p-2">
                                <h2>Scond sections</h2>
                                <x-form-group class="w-100">
                                    <x-form-label>Title</x-form-label>
                                    <x-form-input name="title[{{ $cardId }}]" value="{{ $cardsData[$cardId]['title'] }}" required></x-form-input>
                                    <x-form-input-error name="title.{{ $cardId }}"></x-form-input-error>

                                    <hr class="w-100">
                                    <x-form-label>Text</x-form-label>
                                    <x-form-input name="text[{{ $cardId }}]" value="{{ $cardsData[$cardId]['text'] }}"></x-form-input>
                                    <x-form-input-error name="text.{{ $cardId }}"></x-form-input-error>
                                </x-form-group>
                            </div>
                        @elseif($cardId === 10)
                            <div class="card p-2">
                                <h2>Steps</h2>
                                <x-form-group class="w-100">
                                    <x-form-label>Step 1</x-form-label>
                                    <x-form-input name="title[{{ $cardId }}]" value="{{ $cardsData[$cardId]['title'] }}" required></x-form-input>
                                    <x-form-input-error name="title.{{ $cardId }}"></x-form-input-error>

                                    <hr class="w-100">
                                    <x-form-label>Step 2</x-form-label>
                                    <x-form-input name="text[{{ $cardId }}]" value="{{ $cardsData[$cardId]['text'] }}"></x-form-input>
                                    <x-form-input-error name="text.{{ $cardId }}"></x-form-input-error>
                                </x-form-group>
                            </div>
                        @elseif($cardId === 11)
                                <x-form-group class="w-100">
                                    <x-form-label>Step 3</x-form-label>
                                    <x-form-input name="title[{{ $cardId }}]" value="{{ $cardsData[$cardId]['title'] }}" required></x-form-input>
                                    <x-form-input-error name="title.{{ $cardId }}">
                                    </x-form-input-error>
                                </x-form-group>
                        @else
                            <div class="card">
                                <h2>@lang('Card Not Found')</h2>
                                <p>@lang('This card does not exist in the dataset.')</p>
                            </div>
                        @endif
    {{--                    @php $i = 1 @endphp--}}
                    @endforeach

                    <x-form-group>
                        <x-form-button>@lang('Update Cards')</x-form-button>
                    </x-form-group>
                </x-form>
               @endif
            @endif



        <!-- Toggle Switch Form -->
            <form action="{{ route('page.updateStatus', $pageData['id']) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="status-toggle ml-3">
                    <label for="status-switch" class="switch">
                        <input type="checkbox" id="status-switch" name="active" {{ $pageData['active'] == 1 ? 'checked' : '' }}>
                        <span class="slider round"></span>
                    </label>
                    <span>{{ $pageData['active'] == 1 ? 'On' : 'Off' }}</span>
                </div>
                <!-- Submit button -->
                <button type="submit" class="btn btn-primary">@lang('Update Status')</button>
            </form>

    </div>

    <style>
        .disabled {
            pointer-events: none;
            opacity: 0.3;
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
            align-items: center;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: 0.4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: 0.4s;
        }

        input:checked + .slider {
            background-color: #4caf50;
        }

        input:checked + .slider:before {
            transform: translateX(26px);
        }

        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>
</x-admin-layout>
