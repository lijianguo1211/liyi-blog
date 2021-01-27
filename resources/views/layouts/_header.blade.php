<div class="flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
        <div class="container">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsJay" aria-controls="navbarsJay" aria-expanded="false" aria-label="">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsJay">
                <ul class="navbar-nav mr-auto">
                    @foreach($headerData as $item)
                        <li class="nav-item active">
                            <a class="nav-link" href="#">{{ $item['header_name'] }} <span class="sr-only">(current)</span></a>
                        </li>
                    @endforeach
                </ul>
                <div class="form-inline input-icon-group">
                    <input class="form-control" type="text" placeholder="Search" aria-label="Search">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-3"><circle cx="10.5" cy="10.5" r="7.5"></circle><line x1="21" y1="21" x2="15.8" y2="15.8"></line></svg>
                </div>
            </div>
        </div>
    </nav>
</div>



