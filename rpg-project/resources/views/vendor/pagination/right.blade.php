@if ($paginator->hasMorePages())
    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
@else
    <span class="page-link disabled" aria-disabled="true">&rsaquo;</span>
@endif
