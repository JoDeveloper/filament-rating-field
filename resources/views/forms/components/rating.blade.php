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
                    <label for="{{ $getId() }}-{{ $value }}" class="w-full cursor-pointer bg-white rounded-lg border shadow-sm overflow-hidden dark:bg-gray-800 hover:shadow-md transition-shadow duration-200">
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
                            $optionColor = $getColorForOption($value);
                            $hasColor = !empty($optionColor);
                        @endphp
                        
                        <div @class([
                            'font-medium flex justify-between items-center p-3 peer-checked:border-2 peer-checked:shadow-md',
                            'text-gray-700 border-gray-200' => ! $errors->has($getStatePath()) && ! $hasColor,
                            'dark:text-gray-200 dark:border-gray-700' => (! $errors->has($getStatePath())) && ! $hasColor && config('forms.dark_mode'),
                            'text-danger-600 border-danger-200' => $errors->has($getStatePath()),
                            'border-' . $optionColor . '-500 text-' . $optionColor . '-600 bg-' . $optionColor . '-50 peer-checked:bg-' . $optionColor . '-100 peer-checked:border-' . $optionColor . '-600' => $hasColor && ! $errors->has($getStatePath()),
                            'dark:bg-' . $optionColor . '-900 dark:text-' . $optionColor . '-300 dark:border-' . $optionColor . '-700 dark:peer-checked:bg-' . $optionColor . '-800' => $hasColor && ! $errors->has($getStatePath()) && config('forms.dark_mode'),
                        ])>
                            @if ($hasIcon && $iconHtml)
                                <div class="flex items-center space-x-2">
                                    <div @class([
                                        'flex-shrink-0 w-8 h-8 flex items-center justify-center rounded-full',
                                        'bg-' . $optionColor . '-500 text-white' => $hasColor,
                                        'bg-gray-500 text-white' => ! $hasColor,
                                    ])>
                                        @if($hasIcon && str_starts_with($iconHtml, '<svg'))
                                            {!! $iconHtml !!}
                                        @else
                                          @svg($iconHtml, ['class' => 'w-4 h-4'])
                                        @endif
                                    </div>
                                    @if ($showLabel)
                                        <div class="block">
                                            <div class="text-sm font-medium pointer-events-none">
                                                {{ $label }}
                                            </div>
                                            @if ($description = $getDescription($value))
                                                <div class="text-xs opacity-75">
                                                    {{ $description }}
                                                </div>
                                            @endif
                                        </div>
                                    @endif
                                </div>
                            @else
                                <div class="block w-full">
                                    <div class="text-sm font-medium pointer-events-none">
                                        {{ $label }}
                                    </div>
                                    @if ($description = $getDescription($value))
                                        <div class="text-xs opacity-75">
                                            {{ $description }}
                                        </div>
                                    @endif
                                </div>
                            @endif
                            
                            <div class="flex-shrink-0 ml-2">
                                <div @class([
                                    'w-5 h-5 rounded-full border-2 flex items-center justify-center',
                                    'border-gray-300' => ! $errors->has($getStatePath()) && ! $hasColor,
                                    'border-' . $optionColor . '-500' => $hasColor && ! $errors->has($getStatePath()),
                                    'border-danger-500' => $errors->has($getStatePath()),
                                    'peer-checked:bg-' . $optionColor . '-500 peer-checked:border-' . $optionColor . '-500' => $hasColor,
                                    'peer-checked:bg-blue-500 peer-checked:border-blue-500' => ! $hasColor,
                                    'peer-checked:border-danger-500 peer-checked:bg-danger-500' => $errors->has($getStatePath()),
                                ])>
                                    <div class="w-2 h-2 bg-white rounded-full opacity-0 peer-checked:opacity-100 transition-opacity duration-200"></div>
                                </div>
                            </div>
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
