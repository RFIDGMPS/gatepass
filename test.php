<button id="myButton">Submit</button>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.getElementById('myButton').addEventListener('click', function() {
  Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Yes, do it!',
    cancelButtonText: 'No, cancel!'
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire(
        'Done!',
        'Your action was successful.',
        'success'
      ).then(() => {
        window.location.href = 'main.php';  // Redirect after success
      });
    }
  });
});
</script>
