@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'block w-full px-4 py-3.5 border border-gray-200 rounded-full text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:border-transparent disabled:bg-gray-50 disabled:text-gray-500 transition-all duration-200 text-base', 'style' => 'focus:ring-color: rgba(31, 40, 79, 0.5); focus:border-color: #1F284F;']) }}
    onfocus="this.style.borderColor='#1F284F'; this.style.boxShadow='0 0 0 2px rgba(31, 40, 79, 0.2)'"
    onblur="this.style.borderColor='#e5e7eb'; this.style.boxShadow='none'">
