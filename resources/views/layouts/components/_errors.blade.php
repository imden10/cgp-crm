@if ($errors->any())
    <div style="padding: 15px;">
        <div class="alert alert-danger">
            <ul style="list-style: none;padding: 0;margin: 0;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

@if(\Illuminate\Support\Facades\Session::has('success'))
    <div style="padding: 15px;">
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Alert!</h5>
            {{\Illuminate\Support\Facades\Session::get('success')}}
        </div>
    </div>
@endif

@if(\Illuminate\Support\Facades\Session::has('error'))
    <div style="padding: 15px;">
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-ban"></i> Alert!</h5>
            {{\Illuminate\Support\Facades\Session::get('error')}}
        </div>
    </div>
@endif
