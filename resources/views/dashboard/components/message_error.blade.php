
@if (session()->has('error'))
    <div class="alert alert-danger alert-dismissible alert-solid alert-label-icon fade show" role="alert"
        id="err-alert" style="position: absolute;z-index: 9999;top: 0;right: 0;margin: 24px 24px 0px 0px">
        <i class="mdi mdi-block-helper label-icon"></i><strong>Error</strong> - {{ session()->get('error') }}
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<script>
    setTimeout(() => {
        var element = document.getElementById("err-alert");
        element.classList.remove("show");
    }, 3000);
</script>