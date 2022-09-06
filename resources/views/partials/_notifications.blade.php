@if(session('message'))
<script>
    window.addEventListener("load", function() {
        Toastify({
            text: "{{ session('message') }}",
            offset: {
                x: '2rem',
                y: '2rem'
            },
            duration: 3000,
            gravity: "bottom",
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
                offset: {
                x: '2rem',
                y: '2rem'
            },
                duration: 3000,
                gravity: "bottom",
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
            offset: {
                x: '2rem',
                y: '2rem'
            },
            duration: 3000,
            gravity: "bottom",
            position: "right",
            backgroundColor: "#198754",
        }).showToast();
    });
</script>
@endif

@if(session('error'))
<script>
    window.addEventListener("load", function () {
        Toastify({
            text: "{{ session('error') }}",
            offset: {
                x: '2rem',
                y: '2rem'
            },
            duration: 3000,
            gravity: "bottom",
            position: "right",
            backgroundColor: "#dc3545",
        }).showToast();
    });
</script>
@endif
