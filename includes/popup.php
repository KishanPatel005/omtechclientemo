<?php
$popup_res = mysqli_query($con, "SELECT * FROM welcome_popup WHERE id = 1");
$popup_data = mysqli_fetch_assoc($popup_res);

if ($popup_data && $popup_data['is_active']): 
?>
<!-- SweetAlert2 CSS & JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Show popup only once per session
    if (!sessionStorage.getItem('welcomePopupShown')) {
        setTimeout(function() {
            Swal.fire({
                title: '<?php echo addslashes(htmlspecialchars($popup_data['title'])); ?>',
                html: '<?php echo addslashes(nl2br(htmlspecialchars($popup_data['description']))); ?>',
                icon: 'info',
                confirmButtonText: 'GOT IT!',
                confirmButtonColor: '#FF5F1F',
                customClass: {
                    title: 'font-weight-bold',
                    confirmButton: 'px-5 py-2 font-weight-bold'
                },
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            });
            sessionStorage.setItem('welcomePopupShown', 'true');
        }, 2000); // Show after 2 seconds
    }
});
</script>
<?php endif; ?>
