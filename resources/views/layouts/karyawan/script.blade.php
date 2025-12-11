<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<script>
    setInterval(() => {
        fetch("{{ route('karyawan.apiHome') }}")
            .then(res => res.json())
            .then(data => {
                document.getElementById('pesananBaru').innerText = data.pesananBaru;
                document.getElementById('pendapatanHarian').innerText =
                    "Rp " + new Intl.NumberFormat().format(data.pendapatanHarian);
            });
    }, 3000);

    let lastCount = {
        {
            $pesananBaru ?? 0
        }
    };

    setInterval(() => {
        fetch("{{ route('karyawan.apiHome') }}")
            .then(response => response.json())
            .then(data => {
                let currentCount = data.pesananBaru;

                if (currentCount > lastCount) {
                    const toast = new bootstrap.Toast(document.getElementById('toastPesanan'));
                    toast.show();
                }

                lastCount = currentCount;
            })
            .catch(error => console.error(error));
    }, 5000);
</script>