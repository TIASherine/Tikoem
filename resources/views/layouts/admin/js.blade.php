       <!-- Core -->
       <script src="{{ asset('assets-admin/vendor/@popperjs/core/dist/umd/popper.min.js') }}"></script>
       <script src="{{ asset('assets-admin/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>

       <!-- Vendor JS -->
       <script src="{{ asset('assets-admin/vendor/onscreen/dist/on-screen.umd.min.js') }}"></script>

       <!-- Bootstrap JS -->
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

       <!-- Chart.js -->
       <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

       <!-- Scripts -->
       <script>
           function formatRupiah(value) {
               return "Rp " + value.toLocaleString("id-ID");
           }

           var earningCtx = document.getElementById('earningMonthly').getContext('2d');

           var earning = new Chart(earningCtx, {
               type: 'line',
               data: {
                   labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli',
                       'Agustus', 'September', 'Oktober', 'November', 'Desember'
                   ],
                   datasets: [{
                           label: 'Pemasukan',
                           data: [120000, 150000, 110000, 130000, 170000, 190000, 160000, 200000, 180000, 210000, 230000, 220000],
                           backgroundColor: 'rgba(40, 167, 69, 0.2)',
                           borderColor: 'rgba(40, 167, 69, 1)',
                           borderWidth: 2,
                           tension: 0.4,
                           fill: true
                       },
                       {
                           label: 'Pengeluaran',
                           data: [100000, 110000, 130000, 90000, 120000, 130000, 190000, 150000, 130000, 170000, 160000, 180000],
                           backgroundColor: 'rgba(220, 53, 69, 0.2)',
                           borderColor: 'rgba(220, 53, 69, 1)',
                           borderWidth: 2,
                           tension: 0.4,
                           fill: true
                       }
                   ]
               },
               options: {
                   responsive: true,
                   plugins: {
                       legend: {
                           position: 'top',
                       },
                       tooltip: {
                           callbacks: {
                               label: function(context) {
                                   let label = context.dataset.label || '';
                                   let value = context.parsed.y;
                                   return label + ": " + formatRupiah(value);
                               }
                           }
                       }
                   },
                   scales: {
                       y: {
                           beginAtZero: true,
                           ticks: {
                               callback: function(value) {
                                   return formatRupiah(value);
                               }
                           }
                       }
                   }
               }
           });

           var weeklyCtx = document.getElementById('earningWeekly').getContext('2d');

           var weekly = new Chart(weeklyCtx, {
               type: 'bar',
               data: {
                   labels: ['Minggu 1', 'Minggu 2', 'Minggu 3', 'Minggu 4'],
                   datasets: [{
                           label: 'Pemasukan Mingguan',
                           data: [50000, 75000, 62000, 82000],
                           backgroundColor: 'rgba(40, 167, 69, 0.6)',
                           borderColor: 'rgba(40, 167, 69, 1)',
                           borderWidth: 1
                       },
                       {
                           label: 'Pengeluaran Mingguan',
                           data: [30000, 42000, 35000, 50000],
                           backgroundColor: 'rgba(220, 53, 69, 0.6)',
                           borderColor: 'rgba(220, 53, 69, 1)',
                           borderWidth: 1
                       }
                   ]
               },
               options: {
                   responsive: true,
                   plugins: {
                       tooltip: {
                           callbacks: {
                               label: function(context) {
                                   return context.dataset.label + ": " + formatRupiah(context.parsed.y);
                               }
                           }
                       }
                   },
                   scales: {
                       y: {
                           beginAtZero: true,
                           ticks: {
                               callback: function(value) {
                                   return formatRupiah(value);
                               }
                           }
                       }
                   }
               }
           });
       </script>