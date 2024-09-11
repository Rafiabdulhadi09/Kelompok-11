@if (Session::has('success'))
<script>
  document.getElementById('login').addEventListener('click', function (event) {
    // Mencegah form dikirim secara langsung
    event.preventDefault();
    // Jika dikonfirmasi, kirim form secara manual
    this.closest('form').submit();

    Swal.fire({
      position: "center",
      icon: "success",
      title: "Your work has been saved",
      showConfirmButton: false,
      timer: 1500
    });
  });
</script>
@endif