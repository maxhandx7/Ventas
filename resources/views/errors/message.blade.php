@if(session('success'))
<div id="success-message" class="alert alert-success">
    {{ session('success') }}
</div>
@elseif(session('error'))
<div id="success-message" class="alert alert-danger">
    {{ session('error') }}
</div>
@endif