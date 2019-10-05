<div class="container-fluid small" style="color:lightgrey">
    <h3 class="my-3">
        Bootstrap 4 Responsive Display Matrix
    </h3>
    <div class="row font-weight-bold align-items-center text-center">
        <div class="col-2 text-left">
            <h5 title="Current viuewport width breakpoint">
            <span class="badge badge-light d-inline d-sm-none">xs</span> 
            <span class="badge badge-success d-none d-sm-inline d-md-none">sm</span> 
            <span class="badge badge-warning d-none d-md-inline d-lg-none">md</span> 
            <span class="badge badge-info d-none d-lg-inline d-xl-none">lg</span> 
            <span class="badge badge-danger d-none d-xl-inline">xl</span> 
            </h5>
        </div>
        <div class="col bg-light">xs</div>
        <div class="col bg-success">sm</div>
        <div class="col bg-warning">md</div>
        <div class="col bg-info">lg</div>
        <div class="col bg-danger">xl</div>
    </div>
    <div class="row my-3">
        <div class="col-12 col-md-2 font-weight-bold">hidden only on</div>
        <div class="col small">d-none d-sm-block<span class="card d-none d-sm-block">.</span></div>
        <div class="col small">d-sm-none d-md-block<span class="card border-success d-sm-none d-md-block">.</span></div>
        <div class="col small">d-md-none d-lg-block<span class="card border-warning d-md-none d-lg-block">.</span></div>
        <div class="col small">d-lg-none d-xl-block<span class="card border-info d-lg-none d-xl-block">.</span></div>
        <div class="col small">d-xl-none<span class="card border-danger d-xl-none">.</span></div>
    </div>
    <div class="row my-2">
        <div class="col-12 col-md-2 font-weight-bold">visible only on</div>
        <div class="col small">d-block d-sm-none<span class="card d-block d-sm-none">.</span></div>
        <div class="col small">d-none d-sm-block d-md-none<span class="card border-success d-none d-sm-block d-md-none">.</span></div>
        <div class="col small">d-none d-md-block d-lg-none<span class="card border-warning d-none d-md-block d-lg-none">.</span></div>
        <div class="col small">d-none d-lg-block d-xl-none<span class="card border-info d-none d-lg-block d-xl-none">.</span></div>
        <div class="col small">d-none d-xl-block<span class="card border-danger d-none d-xl-block">.</span></div>
    </div>
    <div class="row my-3">
        <div class="col-12 col-md-2 font-weight-bold">hidden on +larger</div>
        <div class="col small">d-none d-sm-block<span class="card d-none d-sm-block">.</span></div>
        <div class="col small">d-none d-md-block<span class="card border-success d-none d-md-block">.</span></div>
        <div class="col small">d-none d-lg-block<span class="card border-warning d-none d-lg-block">.</span></div>
        <div class="col small">d-none d-xl-block<span class="card border-info d-none d-xl-block">.</span></div>
        <div class="col small">d-none (never)<span class="card d-none">(never displays)</span></div>
    </div>
    <div class="row my-3">
        <div class="col-12 col-md-2 font-weight-bold">hidden on +smaller</div>
        <div class="col small">d-none (never)<span class="card d-none">(never displays)</span></div>
        <div class="col small">d-block d-sm-none<span class="card border-success d-block d-sm-none">.</span></div>
        <div class="col small">d-block d-md-none<span class="card border-warning d-block border-warning d-md-none">.</span></div>
        <div class="col small">d-block d-lg-none<span class="card border-info d-block d-lg-none">.</span></div>
        <div class="col small">d-block d-xl-none<span class="card border-danger d-block d-xl-none">.</span></div>
    </div>
</div>

