<button {{ $attributes->merge(['type' => 'submit', 'class' => 'w-full px-6 py-3 text-white text-base font-semibold rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 transition duration-200 disabled:opacity-50 disabled:cursor-not-allowed shadow-sm', 'style' => 'background-color: #1F284F; border-color: #1F284F;']) }}
    onmouseover="this.style.backgroundColor='#151f3a'"
    onmouseout="this.style.backgroundColor='#1F284F'"
    onfocus="this.style.boxShadow='0 0 0 2px rgba(31, 40, 79, 0.5)'"
    onblur="this.style.boxShadow='0 1px 2px 0 rgba(0, 0, 0, 0.05)'">
    {{ $slot }}
</button>
