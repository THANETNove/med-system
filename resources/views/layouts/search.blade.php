@php
    $currentURL = $_SERVER['REQUEST_URI'];
    $lastPart = basename($currentURL);
    $pathSearch = null;
    if ($lastPart == 'storage-index') {
        $pathSearch = 'storage-index';
    }

@endphp


@if ($lastPart == 'storage-index')
    <form class="user" id="myForm" method="POST" action="{{ route($pathSearch) }}" enctype="multipart/form-data">
        @csrf
        <div class="navbar-nav align-items-center">
            <div class="nav-item d-flex align-items-center">
                <i class="bx bx-search fs-4 lh-0"></i>
                <input type="text" class="form-control border-0 shadow-none" name="search" placeholder="Search..."
                    aria-label="Search..." />
                <button type="submit" class="btn btn-outline-primary">Search</button>
            </div>
        </div>
    </form>
@endif
