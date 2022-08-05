@props(['value'])

<label class = 'block font-medium text-sm 
@auth
@if(themesettings(Auth::id())->theme == 'dark-layout')
text-white
@else
text-gray-700
@endif
@endauth
@guest
text-gray-700
@endguest
'>
    {{ $value ?? $slot }}
</label>
