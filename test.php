<button id="myButton">Submit</button>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.getElementById('myButton').addEventListener('click', function() {
    Swal.fire({
    position: 'top-end',
    icon: 'success',
    title: 'Your request has been saved',
    showConfirmButton: false,
    timer: 1500
}).then(() => {
    // This will run after the alert disappears
    window.location.href = 'main.php';
});
});
</script>
