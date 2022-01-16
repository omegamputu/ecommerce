@if (session()->has('success'))
    <div class="alert alert-success" role="alert">
            {{ session()->get('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
    </div>
    <?php session()->forget('success'); ?>
@endif

@if (session()->has('error'))
    <div class="alert alert-danger" role="alert">
            {{ session()->get('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
    </div>
    <?php session()->forget('error'); ?>
@endif