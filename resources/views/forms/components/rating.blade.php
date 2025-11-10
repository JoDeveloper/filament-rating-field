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
            'filament-forms-rating-component',
            'flex flex-wrap gap-3' => $isInline,
            'gap-2' => ! $isInline,
        ])"
    >
        @php
            $isDisabled = $isDisabled();
        @endphp

        @foreach ($getOptions() as $value => $label)
            <div @class([
                'gap-3' => ! $isInline,
                'gap-2' => $isInline,
            ])>
                <div class="flex items-center">
                    <label for="{{ $getId() }}-{{ $value }}" class="w-full cursor-pointer bg-white rounded-lg border  overflow-hidden dark:bg-gray-800 transition-shadow duration-200">
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
                        @debug($colors,$value)
                        @php
                            $hasIcon = isset($icons[$value]);
                            $iconHtml = $hasIcon ? $icons[$value] : null;
                            $optionColor = $colors[$value] ?? $defaultColor;
                            $hasColor = !empty($optionColor);
                        @endphp
                        
                        <div @class([
                            'font-medium flex justify-between items-center p-3 peer-checked:border-2',
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
                                              @class([
                                                'w-6 h-6',
                                                'bg-' . $optionColor . '-500 text-white' => $hasColor,
                                                'bg-gray-500 text-white' => ! $hasColor,
                                              ])
                                          />
                                    </div>
                                    @if ($showLabel && !$hasIcon)
                                        <div class="block">
                                            <div class="text-sm font-medium pointer-events-none">
                                                {{ $label }}
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @else
                                <div class="block w-full">
                                    <div class="text-sm font-medium pointer-events-none">
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
