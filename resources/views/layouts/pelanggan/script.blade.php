    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        const method = document.getElementById('payment_method');
        const qrisBox = document.getElementById('qris_box');

        method.addEventListener('change', () => {
            qrisBox.style.display = method.value === 'qris' ? 'block' : 'none';
        });
    </script>