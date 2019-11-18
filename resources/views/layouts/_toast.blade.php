@if (session('warning'))
    <div class="alert alert-danger alert-block">
        <button type="buton" class="close" data-dismiss="alert">x</button>
        <strong> {!! session('warning') !!} </strong>
    </div>
@endif