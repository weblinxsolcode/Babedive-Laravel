<!-- ========== END SECONDARY CONTENTS ========== -->

<!-- JS Global Compulsory  -->
<script src="{{ asset('admin/assets/vendor/jquery-migrate/dist/jquery-migrate.min.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

<!-- JS Implementing Plugins -->
<script src="{{ asset('admin/assets/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside.min.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/hs-form-search/dist/hs-form-search.min.js') }}"></script>

<script src="{{ asset('admin/assets/vendor/chart.js/dist/Chart.min.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/chartjs-chart-matrix/dist/chartjs-chart-matrix.min.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels.min.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/daterangepicker/moment.min.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/tom-select/dist/js/tom-select.complete.min.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/clipboard/dist/clipboard.min.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/datatables.net.extensions/select/select.min.js') }}"></script>

<!-- JS Front -->
<script src="{{ asset('admin/assets/js/theme.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/hs.theme-appearance-charts.js') }}"></script>

<!-- JS Implementing Plugins -->
<script src="{{ asset('admin/assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/jszip/dist/jszip.min.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/pdfmake/build/pdfmake.min.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/pdfmake/build/vfs_fonts.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>

<!-- JS Plugins Init. -->

<script>
    (function() {
        // INITIALIZATION OF DATATABLES
        // =======================================================
        HSCore.components.HSDatatables.init('.js-datatable')
        const exportDatatable = HSCore.components.HSDatatables.getItem('exportDatatable')

        document.getElementById('export-copy').addEventListener('click', function() {
            exportDatatable.button('.buttons-copy').trigger()
        })

        document.getElementById('export-excel').addEventListener('click', function() {
            exportDatatable.button('.buttons-excel').trigger()
        })

        document.getElementById('export-csv').addEventListener('click', function() {
            exportDatatable.button('.buttons-csv').trigger()
        })

        document.getElementById('export-pdf').addEventListener('click', function() {
            exportDatatable.button('.buttons-pdf').trigger()
        })

        document.getElementById('export-print').addEventListener('click', function() {
            exportDatatable.button('.buttons-print').trigger()
        })
    })()

</script>
<script>
    $(document).on('ready', function() {
        // INITIALIZATION OF DATERANGEPICKER
        // =======================================================
        $('.js-daterangepicker').daterangepicker();

        $('.js-daterangepicker-times').daterangepicker({
            timePicker: true
            , startDate: moment().startOf('hour')
            , endDate: moment().startOf('hour').add(32, 'hour')
            , locale: {
                format: 'M/DD hh:mm A'
            }
        });

        var start = moment();
        var end = moment();

        function cb(start, end) {
            $('#js-daterangepicker-predefined .js-daterangepicker-predefined-preview').html(start.format('MMM D') + ' - ' + end.format('MMM D, YYYY'));
        }

        $('#js-daterangepicker-predefined').daterangepicker({
            startDate: start
            , endDate: end
            , ranges: {
                'Today': [moment(), moment()]
                , 'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')]
                , 'Last 7 Days': [moment().subtract(6, 'days'), moment()]
                , 'Last 30 Days': [moment().subtract(29, 'days'), moment()]
                , 'This Month': [moment().startOf('month'), moment().endOf('month')]
                , 'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, cb);

        cb(start, end);
    });


    // INITIALIZATION OF DATATABLES
    // =======================================================
    HSCore.components.HSDatatables.init($('#datatable'), {
        select: {
            style: 'multi'
            , selector: 'td:first-child input[type="checkbox"]'
            , classMap: {
                checkAll: '#datatableCheckAll'
                , counter: '#datatableCounter'
                , counterInfo: '#datatableCounterInfo'
            }
        }
        , language: {
            zeroRecords: `<div class="text-center p-4">
            <img class="mb-3" src="{{ asset('admin/assets/svg/illustrations/oc-error.svg') }}" alt="Image Description" style="width: 10rem;" data-hs-theme-appearance="default">
            <img class="mb-3" src="{{ asset('admin/assets/svg/illustrations-light/oc-error.svg') }}" alt="Image Description" style="width: 10rem;" data-hs-theme-appearance="dark">
          <p class="mb-0">No data to show</p>
          </div>`
        }
        , buttons: [
            'copy', 'excel', 'pdf'
        ]
    });

    const datatable = HSCore.components.HSDatatables.getItem(0)

    document.querySelectorAll('.js-datatable-filter').forEach(function(item) {
        item.addEventListener('change', function(e) {
            const elVal = e.target.value
                , targetColumnIndex = e.target.getAttribute('data-target-column-index')
                , targetTable = e.target.getAttribute('data-target-table');

            HSCore.components.HSDatatables.getItem(targetTable).column(targetColumnIndex).search(elVal !== 'null' ? elVal : '').draw()
        })
    })

</script>

<!-- JS Plugins Init. -->
<script>
    (function() {
        localStorage.removeItem('hs_theme')

        window.onload = function() {


            // INITIALIZATION OF NAVBAR VERTICAL ASIDE
            // =======================================================
            new HSSideNav('.js-navbar-vertical-aside').init()


            // INITIALIZATION OF FORM SEARCH
            // =======================================================
            const HSFormSearchInstance = new HSFormSearch('.js-form-search')

            if (HSFormSearchInstance.collection.length) {
                HSFormSearchInstance.getItem(1).on('close', function(el) {
                    el.classList.remove('top-0')
                })

                document.querySelector('.js-form-search-mobile-toggle').addEventListener('click', e => {
                    let dataOptions = JSON.parse(e.currentTarget.getAttribute('data-hs-form-search-options'))
                        , $menu = document.querySelector(dataOptions.dropMenuElement)

                    $menu.classList.add('top-0')
                    $menu.style.left = 0
                })
            }


            // INITIALIZATION OF BOOTSTRAP DROPDOWN
            // =======================================================
            HSBsDropdown.init()


            // INITIALIZATION OF CHARTJS
            // =======================================================
            HSCore.components.HSChartJS.init('.js-chart')


            // INITIALIZATION OF CHARTJS
            // =======================================================
            HSCore.components.HSChartJS.init('#updatingBarChart')
            const updatingBarChart = HSCore.components.HSChartJS.getItem('updatingBarChart')

            // Call when tab is clicked
            document.querySelectorAll('[data-bs-toggle="chart-bar"]').forEach(item => {
                item.addEventListener('click', e => {
                    let keyDataset = e.currentTarget.getAttribute('data-datasets')

                    const styles = HSCore.components.HSChartJS.getTheme('updatingBarChart', HSThemeAppearance.getAppearance())

                    if (keyDataset === 'lastWeek') {
                        updatingBarChart.data.labels = ["Apr 22", "Apr 23", "Apr 24", "Apr 25", "Apr 26", "Apr 27", "Apr 28", "Apr 29", "Apr 30", "Apr 31"];
                        updatingBarChart.data.datasets = [{
                                "data": [120, 250, 300, 200, 300, 290, 350, 100, 125, 320]
                                , "backgroundColor": styles.data.datasets[0].backgroundColor
                                , "hoverBackgroundColor": styles.data.datasets[0].hoverBackgroundColor
                                , "borderColor": styles.data.datasets[0].borderColor
                                , "maxBarThickness": 10
                            }
                            , {
                                "data": [250, 130, 322, 144, 129, 300, 260, 120, 260, 245, 110]
                                , "backgroundColor": styles.data.datasets[1].backgroundColor
                                , "borderColor": styles.data.datasets[1].borderColor
                                , "maxBarThickness": 10
                            }
                        ];
                        updatingBarChart.update();
                    } else {
                        updatingBarChart.data.labels = ["May 1", "May 2", "May 3", "May 4", "May 5", "May 6", "May 7", "May 8", "May 9", "May 10"];
                        updatingBarChart.data.datasets = [{
                                "data": [200, 300, 290, 350, 150, 350, 300, 100, 125, 220]
                                , "backgroundColor": styles.data.datasets[0].backgroundColor
                                , "hoverBackgroundColor": styles.data.datasets[0].hoverBackgroundColor
                                , "borderColor": styles.data.datasets[0].borderColor
                                , "maxBarThickness": 10
                            }
                            , {
                                "data": [150, 230, 382, 204, 169, 290, 300, 100, 300, 225, 120]
                                , "backgroundColor": styles.data.datasets[1].backgroundColor
                                , "borderColor": styles.data.datasets[1].borderColor
                                , "maxBarThickness": 10
                            }
                        ]
                        updatingBarChart.update();
                    }
                })
            })

            // INITIALIZATION OF CHARTJS
            // =======================================================
            HSCore.components.HSChartJS.init('.js-chart-datalabels', {
                plugins: [ChartDataLabels]
                , options: {
                    plugins: {
                        datalabels: {
                            anchor: function(context) {
                                var value = context.dataset.data[context.dataIndex];
                                return value.r < 20 ? 'end' : 'center';
                            }
                            , align: function(context) {
                                var value = context.dataset.data[context.dataIndex];
                                return value.r < 20 ? 'end' : 'center';
                            }
                            , color: function(context) {
                                var value = context.dataset.data[context.dataIndex];
                                return value.r < 20 ? context.dataset.backgroundColor : context.dataset.color;
                            }
                            , font: function(context) {
                                var value = context.dataset.data[context.dataIndex]
                                    , fontSize = 25;

                                if (value.r > 50) {
                                    fontSize = 35;
                                }

                                if (value.r > 70) {
                                    fontSize = 55;
                                }

                                return {
                                    weight: 'lighter'
                                    , size: fontSize
                                };
                            }
                            , formatter: function(value) {
                                return value.r
                            }
                            , offset: 2
                            , padding: 0
                        }
                    }
                , }
            })

            // INITIALIZATION OF SELECT
            // =======================================================
            HSCore.components.HSTomSelect.init('.js-select')


            // INITIALIZATION OF CLIPBOARD
            // =======================================================
            HSCore.components.HSClipboard.init('.js-clipboard')
        }
    })()

</script>

<!-- Style Switcher JS -->
<script>
    (function() {
        // STYLE SWITCHER
        // =======================================================
        const $dropdownBtn = document.getElementById('selectThemeDropdown') // Dropdowon trigger
        const $variants = document.querySelectorAll(`[aria-labelledby="selectThemeDropdown"] [data-icon]`) // All items of the dropdown

        // Function to set active style in the dorpdown menu and set icon for dropdown trigger
        const setActiveStyle = function() {
            $variants.forEach($item => {
                if ($item.getAttribute('data-value') === HSThemeAppearance.getOriginalAppearance()) {
                    $dropdownBtn.innerHTML = `<i class="${$item.getAttribute('data-icon')}" />`
                    return $item.classList.add('active')
                }

                $item.classList.remove('active')
            })
        }

        // Add a click event to all items of the dropdown to set the style
        $variants.forEach(function($item) {
            $item.addEventListener('click', function() {
                HSThemeAppearance.setAppearance($item.getAttribute('data-value'))
            })
        })

        // Call the setActiveStyle on load page
        setActiveStyle()

        // Add event listener on change style to call the setActiveStyle function
        window.addEventListener('on-hs-appearance-change', function() {
            setActiveStyle()
        })
    })()

</script>
<!-- End Style Switcher JS -->

<!-- Sweet alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Add event listener for click event on delete button
    $(document).ready(function() {
        $('.delete').click(function(event) {
            event.preventDefault();

            // Reference to the clicked button
            var button = $(this);

            // Show Swal confirmation dialog
            Swal.fire({
                title: "Are you sure?"
                , text: "You won't be able to revert this!"
                , icon: "warning"
                , showCancelButton: true
                , confirmButtonColor: "#d33"
                , cancelButtonColor: "#3085d6"
                , confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    var url = button.data('url');
                    window.location.href = url;
                }
            });
        });
    });

    $(document).ready(function() {
        $('.delete').click(function(event) {
            event.preventDefault();

            // Reference to the clicked button
            var button = $(this);

            // Show Swal confirmation dialog
            Swal.fire({
                title: "Are you sure?"
                , text: "You won't be able to revert this!"
                , icon: "warning"
                , showCancelButton: true
                , confirmButtonColor: "#d33"
                , cancelButtonColor: "#3085d6"
                , confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    var url = button.data('url');
                    window.location.href = url;
                }
            });
        });
    });

</script>

<!-- Numbers only script -->
<script>
    $(document).ready(function() {
        $('.numberOnly').on('input', function() {
            // Allow only numbers, backspace, delete, arrow keys, and tab
            $(this).val($(this).val().replace(/[^0-9]/g, ''));
        });

        $('#datePicker').daterangepicker();
    });

</script>

<!-- daterangepicker -->
<script src="{{ asset('admin/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('admin/plugins/daterangepicker/daterangepicker.js') }}"></script>
