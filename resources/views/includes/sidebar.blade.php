<div class="sidenav">
    <div class="row">
        <div class="col-12 text-center" style="margin-top: 70px;">
            <div class="sidelink mb-3">
                <a href="{{ route('app') }}" {{ (request()->is('/')) ? 'active' : '' }}>Home</a>
            </div>
            <div class="sidelink mb-3">
                <a href="{{ route('account') }}">My Account</a>
            </div>
        </div>
    </div>
</div>