@if (count($errors) > 0)
<div style="padding-top: 5rem">
    <ul class="alert alert-danger" role="alert">
        @foreach ($errors->all() as $error)
            <li class="ml-4">{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif