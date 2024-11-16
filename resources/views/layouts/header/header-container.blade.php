<div class="dashboard__header single_border_bottom">
    <div class="row gx-4 align-items-center justify-content-between">
        @auth
            <div class="col-sm-2">
                @include('layouts.header.header-left')
            </div>

            <div class="col-sm-6 d-none d-sm-block">
                @include('layouts.header.header-center')
            </div>

            <div class="col-sm-4">
                @include('layouts.header.header-right')
            </div>
        @else
            <div class="col-sm-12">
                @include('layouts.header.header-right')
            </div>
        @endauth
    </div>
</div>
