<x-dynamic-component
    :component="$getFieldWrapperView()"
    :id="$getId()"
    :label="$getLabel()"
    :label-sr-only="$isLabelHidden()"
    :helper-text="$getHelperText()"
    :hint="$getHint()"
    :hint-icon="$getHintIcon()"
    :required="$isRequired()"
    :state-path="$getStatePath()"
>
    @php
        $icons = $getIcons();
        $colors = $getColors();
        $defaultColor = $getDefaultColor();
        $showLabel = $getShowLabel();
        $isInline = $getInline();
    @endphp
    
    @if ($isInline)
        <x-slot name="labelSuffix">
    @endif
    <x-filament::grid
        :default="$getColumns('default')"
        :sm="$getColumns('sm')"
        :md="$getColumns('md')"
        :lg="$getColumns('lg')"
        :xl="$getColumns('xl')"
        :two-xl="$getColumns('2xl')"
        :is-grid="! $isInline"
        :attributes="$attributes->merge($getExtraAttributes())->class([
            'filament-forms-rating-component gap-1',
            'flex flex-wrap' => $isInline,
        ])"
    >
        @php
            $isDisabled = $isDisabled();
        @endphp

        @foreach ($getOptions() as $value => $label)
            <div >
                <div class="flex items-center">
                    <label for="{{ $getId() }}-{{ $value }}" @class([
                        'w-full cursor-pointer bg-white rounded-lg border overflow-hidden dark:bg-gray-800 transition-shadow duration-200',
                        'ring-2 ring-green-500 ring-offset-2' => $isSelected($value),
                    ])>
                        <input
                            name="{{ $getId() }}"
                            id="{{ $getId() }}-{{ $value }}"
                            type="radio"
                            value="{{ $value }}"
                            dusk="filament.forms.{{ $getStatePath() }}"
                        {{ $applyStateBindingModifiers('wire:model') }}="{{ $getStatePath() }}"
                        {{ $getExtraInputAttributeBag()->class([
                            'hidden peer',
                        ]) }}
                        {!! ($isDisabled || $isOptionDisabled($value, $label)) ? 'disabled' : null !!}
                        />
                        @php
                            $hasIcon = isset($icons[$value]);
                            $iconHtml = $hasIcon ? $icons[$value] : null;
                            $optionColor = $colors[$value] ?? $defaultColor;
                            $hasColor = !empty($optionColor);
                        @endphp
                        
                        <div @class([
                            'font-medium flex justify-between items-center p-2 peer-checked:border-2',
                            'text-gray-700 border-gray-200' => ! $errors->has($getStatePath()) && ! $hasColor,
                            'dark:text-gray-200 dark:border-gray-700' => (! $errors->has($getStatePath())) && ! $hasColor && config('forms.dark_mode'),
                            'text-danger-600 border-danger-200' => $errors->has($getStatePath()),
                        ])>
                            @if ($hasIcon && $iconHtml)
                                <div class="flex items-center space-x-2">
                                    <div @class([
                                        'flex-shrink-0 w-8 h-8 flex items-center justify-center rounded-full',
                                    ])>
                                        <x-filament::icon
                                              :icon="$iconHtml"
                                              wire:loading.attr="disabled"
                                              @class([
                                                'w-8 h-8 text-white',
                                                'bg-gray-500 text-white' => ! $hasColor,
                                              ])
                                              style="background-color: {{ $optionColor }};"
                                          />
                                    </div>
                                </div>
                            @elseif ($showLabel && !$hasIcon)
                                <div class="block text-center">
                                            <div
                                            @class([
                                                'flex text-sm font-medium pointer-events-none w-8 h-8 items-center justify-center',
                                                'bg-gray-500 text-white' => ! $hasColor,
                                              ])
                                              style="background-color: {{ $optionColor }};"
                                            >
                                                {{ $label }}
                                            </div>
                                        </div>
                            @endif
                          
                        </div>
                    </label>
                </div>
            </div>
        @endforeach
    </x-filament::grid>
    @if ($isInline)
        </x-slot>
    @endif
</x-dynamic-component>
