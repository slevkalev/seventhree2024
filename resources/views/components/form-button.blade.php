<button {{ $attributes->merge(['class'=>'button', 'type'=>'submit'])}}>
    {{ $slot }}
</button>
