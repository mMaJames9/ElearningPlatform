@if ($paginator->hasPages())
<div class="card-footer bg-light d-flex justify-content-center">
    <div class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        <button class="btn btn-falcon-default btn-sm me-2 page-item disabled" aria-disabled="true" type="button" disabled="disabled" data-bs-toggle="tooltip" data-bs-placement="top" title="@lang('pagination.previous')">
            <span class="fas fa-chevron-left"></span>
        </button>
        @else
        <a class="btn btn-falcon-default btn-sm me-2 page-item " type="button" disabled="disabled" data-bs-toggle="tooltip" data-bs-placement="top" title="@lang('pagination.previous')" href="{{ $paginator->previousPageUrl() }}">
            <span class="fas fa-chevron-left"></span>
        </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <button class="btn btn-sm btn-falcon-default me-2 page-item disabled" aria-disabled="true">
                    <span class="">{{ $element }}</span>
                </button>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <button class="btn btn-sm btn-primary me-2 page-item" aria-current="page">
                        <span class="">{{ $page }}</span>
                    </button>
                @else
                    <a class="btn btn-sm btn-falcon-default me-2 page-item " href="{{ $url }}">
                        <span class="">{{ $page }}</span>
                    </a>
                @endif
            @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        <a class="btn btn-falcon-default btn-sm me-2 page-item " type="button" disabled="disabled" data-bs-toggle="tooltip" data-bs-placement="top" title="@lang('pagination.next')" href="{{ $paginator->nextPageUrl() }}">
            <span class="fas fa-chevron-right"></span>
        </a>
        @else
            <button class="btn btn-falcon-default btn-sm me-2 page-item disabled" aria-disabled="true" type="button" disabled="disabled" data-bs-toggle="tooltip" data-bs-placement="top" title="@lang('pagination.next')">
                <span class="fas fa-chevron-right"></span>
            </button>
        @endif

    </div>
</div>
@endif
