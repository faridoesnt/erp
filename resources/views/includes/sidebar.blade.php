<div class="sidenav">
    <div class="row">
        <div class="col-12 text-center" style="margin-top: 70px;">
            <div class="sidelink mb-3">
                <a href="{{ route('app') }}" {{ (request()->is('/')) ? 'active' : '' }}>Home</a>
            </div>
            @if (Gate::check('karyawan') || Gate::check('manager') || Gate::check('supervisor'))
                <div class="sidelink mb-3">
                    <a href="{{ route('account') }}">My Account</a>
                </div>
            @endif
        </div>
    </div>
</div>