@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible alert-solid alert-label-icon fade show" role="alert"
        id="succ-alert" style="position: absolute;z-index: 9999;top: 0;right: 0;margin: 24px 24px 0px 0px">
        <i class="ri-check-double-line label-icon"></i><strong>Success</strong> - {{ session()->get('success') }}
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<script>
    setTimeout(() => {
        var element = document.getElementById("succ-alert");
        element.classList.remove("show");
    }, 3000);
</script>