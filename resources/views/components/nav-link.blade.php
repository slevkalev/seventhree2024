@props(['active' => false])

<a class="{{ $active ? 'nav-link-active' : 'nav-link' }}" aria-current="{{ request()->is('/') ? 'page' : 'false' }}" {{ $attributes }}
>{{ $slot }}</a>
