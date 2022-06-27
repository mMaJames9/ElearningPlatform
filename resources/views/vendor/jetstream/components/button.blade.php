<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 btn-primary rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:btn-primary active:btn-primary focus:outline-none focus:ring focus:ring-primary-300 disabled:opacity-25 transition']) }}>
    {{ $slot }}
</button>
