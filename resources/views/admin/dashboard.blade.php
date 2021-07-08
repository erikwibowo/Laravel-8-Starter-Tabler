@extends('admin.layouts.master')
@section('content')
    <div class="row row-deck row-cards">
        <div class="col-md-6 col-xl-3">
            <div class="card card-sm">
                <div class="card-body d-flex align-items-center">
                <span class="bg-green text-white stamp mr-3"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><circle cx="9" cy="19" r="2"></circle><circle cx="17" cy="19" r="2"></circle><path d="M3 3h2l2 12a3 3 0 0 0 3 2h7a3 3 0 0 0 3 -2l1 -7h-15.2"></path></svg>
                </span>
                <div class="mr-3 lh-sm">
                    <div class="strong">
                    78 Orders
                    </div>
                    <div class="text-muted">32 shipped</div>
                </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card card-sm">
                <div class="card-body d-flex align-items-center">
                <span class="bg-red text-white stamp mr-3"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><circle cx="12" cy="7" r="4"></circle><path d="M5.5 21v-2a4 4 0 0 1 4 -4h5a4 4 0 0 1 4 4v2"></path></svg>
                </span>
                <div class="mr-3 lh-sm">
                    <div class="strong">
                    1,352 Members
                    </div>
                    <div class="text-muted">163 registered today</div>
                </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card card-sm">
                <div class="card-body d-flex align-items-center">
                <span class="bg-blue text-white stamp mr-3"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2"></path><path d="M12 3v3m0 12v3"></path></svg>
                </span>
                <div class="mr-3 lh-sm">
                    <div class="strong">
                    132 Sales
                    </div>
                    <div class="text-muted">12 waiting payments</div>
                </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card card-sm">
                <div class="card-body d-flex align-items-center">
                <span class="bg-yellow text-white stamp mr-3"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><path d="M4 21v-13a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-9l-4 4"></path><line x1="8" y1="9" x2="16" y2="9"></line><line x1="8" y1="13" x2="14" y2="13"></line></svg>
                </span>
                <div class="mr-3 lh-sm">
                    <div class="strong">
                    132 Comments
                    </div>
                    <div class="text-muted">16 waitings</div>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection