@if(session('notification'))
<div class="container messageContainer">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Notification') }}</div>
                <div class="card-body">                    
                    <ul>
                        <li>
                            {{ session('notification') }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endif