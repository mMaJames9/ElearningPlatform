<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center justify-center px-4 py-2 btn-danger border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:btn-danger focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:btn-danger disabled:opacity-25 transition']) }}>
    {{ $slot }}
</button>
