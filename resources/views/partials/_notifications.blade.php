@if(session('message'))
<script>
    window.addEventListener("load", function() {
        Toastify({
            text: "{{ session('message') }}",
            duration: 5000,
            close:true,
            gravity:"top",
            position: "right",
            backgroundColor: "#198754",
        }).showToast();
    });
</script>
@endif

@if($errors->count() > 0)
@foreach($errors->all() as $error)
    <script>
        window.addEventListener("load", function() {
            Toastify({
                text: "{{ $error }}",
                duration: 5000,
                close:true,
                gravity:"top",
                position: "right",
                backgroundColor: "#dc3545",
            }).showToast();
        });
    </script>
@endforeach
@endif

@if(session('status'))
<script>
    window.addEventListener("load", function () {
        Toastify({
            text: "{{ session('status') }}",
            duration: 5000,
            close: true,
            gravity: "top",
            position: "right",
            backgroundColor: "#198754",
        }).showToast();
    });
</script>
@endif
