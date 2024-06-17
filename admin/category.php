<?php
session_start();

if (isset($_SESSION["admin"])) {

    $adata = $_SESSION["admin"];

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Super Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" type="image/x-icon" href="favicon.png" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/perfect-scrollbar.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/style.css" />
    <link defer rel="stylesheet" type="text/css" media="screen" href="assets/css/animate.css" />
    <script src="assets/js/perfect-scrollbar.min.js"></script>
    <script defer src="assets/js/popper.min.js"></script>
    <script defer src="assets/js/tippy-bundle.umd.min.js"></script>
    <script defer src="assets/js/sweetalert.min.js"></script>
</head>

<body x-data="main" class="relative overflow-x-hidden font-nunito text-sm font-normal antialiased"
    :class="[ $store.app.sidebar ? 'toggle-sidebar' : '', $store.app.theme === 'dark' || $store.app.isDarkMode ?  'dark' : '', $store.app.menu, $store.app.layout,$store.app.rtlClass]">
    <!-- sidebar menu overlay -->
    <div x-cloak class="fixed inset-0 z-50 bg-[black]/60 lg:hidden" :class="{'hidden' : !$store.app.sidebar}"
        @click="$store.app.toggleSidebar()"></div>

    <!-- screen loader -->
    <div
        class="screen_loader animate__animated fixed inset-0 z-[60] grid place-content-center bg-[#fafafa] dark:bg-[#060818]">
        <svg width="64" height="64" viewBox="0 0 135 135" xmlns="http://www.w3.org/2000/svg" fill="#4361ee">
            <path
                d="M67.447 58c5.523 0 10-4.477 10-10s-4.477-10-10-10-10 4.477-10 10 4.477 10 10 10zm9.448 9.447c0 5.523 4.477 10 10 10 5.522 0 10-4.477 10-10s-4.478-10-10-10c-5.523 0-10 4.477-10 10zm-9.448 9.448c-5.523 0-10 4.477-10 10 0 5.522 4.477 10 10 10s10-4.478 10-10c0-5.523-4.477-10-10-10zM58 67.447c0-5.523-4.477-10-10-10s-10 4.477-10 10 4.477 10 10 10 10-4.477 10-10z">
                <animateTransform attributeName="transform" type="rotate" from="0 67 67" to="-360 67 67" dur="2.5s"
                    repeatCount="indefinite" />
            </path>
            <path
                d="M28.19 40.31c6.627 0 12-5.374 12-12 0-6.628-5.373-12-12-12-6.628 0-12 5.372-12 12 0 6.626 5.372 12 12 12zm30.72-19.825c4.686 4.687 12.284 4.687 16.97 0 4.686-4.686 4.686-12.284 0-16.97-4.686-4.687-12.284-4.687-16.97 0-4.687 4.686-4.687 12.284 0 16.97zm35.74 7.705c0 6.627 5.37 12 12 12 6.626 0 12-5.373 12-12 0-6.628-5.374-12-12-12-6.63 0-12 5.372-12 12zm19.822 30.72c-4.686 4.686-4.686 12.284 0 16.97 4.687 4.686 12.285 4.686 16.97 0 4.687-4.686 4.687-12.284 0-16.97-4.685-4.687-12.283-4.687-16.97 0zm-7.704 35.74c-6.627 0-12 5.37-12 12 0 6.626 5.373 12 12 12s12-5.374 12-12c0-6.63-5.373-12-12-12zm-30.72 19.822c-4.686-4.686-12.284-4.686-16.97 0-4.686 4.687-4.686 12.285 0 16.97 4.686 4.687 12.284 4.687 16.97 0 4.687-4.685 4.687-12.283 0-16.97zm-35.74-7.704c0-6.627-5.372-12-12-12-6.626 0-12 5.373-12 12s5.374 12 12 12c6.628 0 12-5.373 12-12zm-19.823-30.72c4.687-4.686 4.687-12.284 0-16.97-4.686-4.686-12.284-4.686-16.97 0-4.687 4.686-4.687 12.284 0 16.97 4.686 4.687 12.284 4.687 16.97 0z">
                <animateTransform attributeName="transform" type="rotate" from="0 67 67" to="360 67 67" dur="8s"
                    repeatCount="indefinite" />
            </path>
        </svg>
    </div>

    <!-- scroll to top button -->
    <div class="fixed bottom-6 z-50 ltr:right-6 rtl:left-6" x-data="scrollToTop">
        <template x-if="showTopButton">
            <button type="button"
                class="btn btn-outline-primary animate-pulse rounded-full bg-[#fafafa] p-2 dark:bg-[#060818] dark:hover:bg-primary"
                @click="goToTop">
                <svg width="24" height="24" class="h-4 w-4" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"
                        d="M12 20.75C12.4142 20.75 12.75 20.4142 12.75 20L12.75 10.75L11.25 10.75L11.25 20C11.25 20.4142 11.5858 20.75 12 20.75Z"
                        fill="currentColor" />
                    <path
                        d="M6.00002 10.75C5.69667 10.75 5.4232 10.5673 5.30711 10.287C5.19103 10.0068 5.25519 9.68417 5.46969 9.46967L11.4697 3.46967C11.6103 3.32902 11.8011 3.25 12 3.25C12.1989 3.25 12.3897 3.32902 12.5304 3.46967L18.5304 9.46967C18.7449 9.68417 18.809 10.0068 18.6929 10.287C18.5768 10.5673 18.3034 10.75 18 10.75L6.00002 10.75Z"
                        fill="currentColor" />
                </svg>
            </button>
        </template>
    </div>


    <?php
        require "theme.php";
        ?>


    <div class="main-container min-h-screen text-black dark:text-white-dark" :class="[$store.app.navbar]">


        <?php
        require "sidebar.php";
        ?>


        <div class="main-content flex min-h-screen flex-col">

            <?php
        require "hedder.php";
        ?>


            <div class="dvanimation animate__animated p-6" :class="[$store.app.animation]">
                <!-- start main content section -->
                <div x-data="sales">
                    <ul class="flex space-x-2 rtl:space-x-reverse">
                        <li>
                            <a href="index.php" class="text-primary hover:underline">Dashboard</a>
                        </li>
                        <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                            <span>All Posts</span>
                        </li>
                    </ul>

                    <div class="pt-5">

                        <br>

                        <h1 class="text-2xl">Add New Category</h1>



                        <input type="text" placeholder="Category Name" id="cname" class="form-input mb-3" required />

                        <textarea rows="3" class="form-textarea" id="cdes" placeholder="Enter Category Description"
                            required></textarea>

                        <button onclick="addCat();" class="btn btn-success mb-8">Add</button>


                        <div class="hidden" id="loadEditCat">

                        
                        </div>


                       
                        <div class="table-responsive" id="catTable">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Category ID</th>
                                        <th>Category Name</th>
                                        <th>Category Description</th>
                                        <th class="text-center">Related Posts</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Action </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
        
        $crs = Database::search("SELECT * FROM `category` ");
        $cnum = $crs->num_rows;

        for ($i=0; $i < $cnum ; $i++) { 
                $cdata = $crs->fetch_assoc();

                $prs = Database::search("SELECT * FROM `post` WHERE `category_id` = '". $cdata["category_id"]."' ");
                $pnum = $prs->num_rows;

                ?>
                                    <tr>
                                        <td><?php echo $cdata["category_id"] ?></td>
                                        <td><?php echo $cdata["category"] ?></td>
                                        <td><?php echo $cdata["description"] ?></td>
                                        <td class="text-center"><?php echo $pnum ?></td>
                                        <td class="text-center">

                                            <?php 
           
           if ($cdata["category_status_id"] == "1") {
          ?> <span class="badge bg-success rounded-full">Active</span> <?php
           }else if($cdata["category_status_id"] == "2") {
            ?> <span class="badge bg-danger rounded-full">Inactive</span> <?php
             }else if($cdata["category_status_id"] == "3") {
                ?> <span class="badge bg-warning rounded-full">Reqested</span> <?php
                 }
           
           ?>

                                        </td>
                                        <td>



                                            <div class="grid grid-cols-1 gap-2 mb-1 lg:grid-cols-3 mt-1">

                                                <button class="btn btn-warning"
                                                    onclick="editCat(<?php echo $cdata["category_id"]; ?>);">
                                                    <i class="fa fa-pencil"></i>
                                                </button>

                                                <button class="btn btn-success"
                                                    onclick="activeCat(<?php echo $cdata["category_id"]; ?>);">
                                                    <i class="fa fa-check"></i>
                                                </button>

                                                <button class="btn btn-danger"
                                                    onclick="inactiveCat(<?php echo $cdata["category_id"]; ?>);">
                                                    <i class="fa fa-close"></i>
                                                </button>


                                            </div>





                                        </td>
                                    </tr>
                                    <?php
        }
        
        ?>





                                </tbody>
                            </table>
                        </div>




                    </div>
                </div>
                <!-- end main content section -->
            </div>
            <?php
        require "footer.php";
        ?>


        </div>
    </div>

    <script src="assets/js/alpine-collaspe.min.js"></script>
    <script src="assets/js/alpine-persist.min.js"></script>
    <script defer src="assets/js/alpine-ui.min.js"></script>
    <script defer src="assets/js/alpine-focus.min.js"></script>
    <script defer src="assets/js/alpine.min.js"></script>
    <script src="assets/js/custom.js"></script>
    <script defer src="assets/js/apexcharts.js"></script>
    <script src="admin.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    document.addEventListener('alpine:init', () => {
        // main section
        Alpine.data('scrollToTop', () => ({
            showTopButton: false,
            init() {
                window.onscroll = () => {
                    this.scrollFunction();
                };
            },

            scrollFunction() {
                if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
                    this.showTopButton = true;
                } else {
                    this.showTopButton = false;
                }
            },

            goToTop() {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            },
        }));

        // theme customization
        Alpine.data('customizer', () => ({
            showCustomizer: false,
        }));

        // sidebar section
        Alpine.data('sidebar', () => ({
            init() {
                const selector = document.querySelector('.sidebar ul a[href="' + window.location
                    .pathname + '"]');
                if (selector) {
                    selector.classList.add('active');
                    const ul = selector.closest('ul.sub-menu');
                    if (ul) {
                        let ele = ul.closest('li.menu').querySelectorAll('.nav-link');
                        if (ele) {
                            ele = ele[0];
                            setTimeout(() => {
                                ele.click();
                            });
                        }
                    }
                }
            },
        }));

        // header section
        Alpine.data('header', () => ({
            init() {
                const selector = document.querySelector('ul.horizontal-menu a[href="' + window
                    .location.pathname + '"]');
                if (selector) {
                    selector.classList.add('active');
                    const ul = selector.closest('ul.sub-menu');
                    if (ul) {
                        let ele = ul.closest('li.menu').querySelectorAll('.nav-link');
                        if (ele) {
                            ele = ele[0];
                            setTimeout(() => {
                                ele.classList.add('active');
                            });
                        }
                    }
                }
            },

            notifications: [{
                    id: 1,
                    profile: 'user-profile.jpeg',
                    message: '<strong class="text-sm mr-1">John Doe</strong>invite you to <strong>Prototyping</strong>',
                    time: '45 min ago',
                },
                {
                    id: 2,
                    profile: 'profile-34.jpeg',
                    message: '<strong class="text-sm mr-1">Adam Nolan</strong>mentioned you to <strong>UX Basics</strong>',
                    time: '9h Ago',
                },
                {
                    id: 3,
                    profile: 'profile-16.jpeg',
                    message: '<strong class="text-sm mr-1">Anna Morgan</strong>Upload a file',
                    time: '9h Ago',
                },
            ],

            messages: [{
                    id: 1,
                    image: '<span class="grid place-content-center w-9 h-9 rounded-full bg-success-light dark:bg-success text-success dark:text-success-light"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg></span>',
                    title: 'Congratulations!',
                    message: 'Your OS has been updated.',
                    time: '1hr',
                },
                {
                    id: 2,
                    image: '<span class="grid place-content-center w-9 h-9 rounded-full bg-info-light dark:bg-info text-info dark:text-info-light"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg></span>',
                    title: 'Did you know?',
                    message: 'You can switch between artboards.',
                    time: '2hr',
                },
                {
                    id: 3,
                    image: '<span class="grid place-content-center w-9 h-9 rounded-full bg-danger-light dark:bg-danger text-danger dark:text-danger-light"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span>',
                    title: 'Something went wrong!',
                    message: 'Send Reposrt',
                    time: '2days',
                },
                {
                    id: 4,
                    image: '<span class="grid place-content-center w-9 h-9 rounded-full bg-warning-light dark:bg-warning text-warning dark:text-warning-light"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">    <circle cx="12" cy="12" r="10"></circle>    <line x1="12" y1="8" x2="12" y2="12"></line>    <line x1="12" y1="16" x2="12.01" y2="16"></line></svg></span>',
                    title: 'Warning',
                    message: 'Your password strength is low.',
                    time: '5days',
                },
            ],

            languages: [{
                    id: 1,
                    key: 'Chinese',
                    value: 'zh',
                },
                {
                    id: 2,
                    key: 'Danish',
                    value: 'da',
                },
                {
                    id: 3,
                    key: 'English',
                    value: 'en',
                },
                {
                    id: 4,
                    key: 'French',
                    value: 'fr',
                },
                {
                    id: 5,
                    key: 'German',
                    value: 'de',
                },
                {
                    id: 6,
                    key: 'Greek',
                    value: 'el',
                },
                {
                    id: 7,
                    key: 'Hungarian',
                    value: 'hu',
                },
                {
                    id: 8,
                    key: 'Italian',
                    value: 'it',
                },
                {
                    id: 9,
                    key: 'Japanese',
                    value: 'ja',
                },
                {
                    id: 10,
                    key: 'Polish',
                    value: 'pl',
                },
                {
                    id: 11,
                    key: 'Portuguese',
                    value: 'pt',
                },
                {
                    id: 12,
                    key: 'Russian',
                    value: 'ru',
                },
                {
                    id: 13,
                    key: 'Spanish',
                    value: 'es',
                },
                {
                    id: 14,
                    key: 'Swedish',
                    value: 'sv',
                },
                {
                    id: 15,
                    key: 'Turkish',
                    value: 'tr',
                },
                {
                    id: 16,
                    key: 'Arabic',
                    value: 'ae',
                },
            ],

            removeNotification(value) {
                this.notifications = this.notifications.filter((d) => d.id !== value);
            },

            removeMessage(value) {
                this.messages = this.messages.filter((d) => d.id !== value);
            },
        }));

        // content section
        Alpine.data('sales', () => ({
            init() {
                isDark = this.$store.app.theme === 'dark' || this.$store.app.isDarkMode ? true :
                    false;
                isRtl = this.$store.app.rtlClass === 'rtl' ? true : false;

                const revenueChart = null;
                const salesByCategory = null;
                const dailySales = null;
                const totalOrders = null;

                // revenue
                setTimeout(() => {
                    this.revenueChart = new ApexCharts(this.$refs.revenueChart, this
                        .revenueChartOptions);
                    this.$refs.revenueChart.innerHTML = '';
                    this.revenueChart.render();

                    // sales by category
                    this.salesByCategory = new ApexCharts(this.$refs.salesByCategory, this
                        .salesByCategoryOptions);
                    this.$refs.salesByCategory.innerHTML = '';
                    this.salesByCategory.render();

                    // daily sales
                    this.dailySales = new ApexCharts(this.$refs.dailySales, this
                        .dailySalesOptions);
                    this.$refs.dailySales.innerHTML = '';
                    this.dailySales.render();

                    // total orders
                    this.totalOrders = new ApexCharts(this.$refs.totalOrders, this
                        .totalOrdersOptions);
                    this.$refs.totalOrders.innerHTML = '';
                    this.totalOrders.render();
                }, 300);

                this.$watch('$store.app.theme', () => {
                    isDark = this.$store.app.theme === 'dark' || this.$store.app
                        .isDarkMode ? true : false;

                    this.revenueChart.updateOptions(this.revenueChartOptions);
                    this.salesByCategory.updateOptions(this.salesByCategoryOptions);
                    this.dailySales.updateOptions(this.dailySalesOptions);
                    this.totalOrders.updateOptions(this.totalOrdersOptions);
                });

                this.$watch('$store.app.rtlClass', () => {
                    isRtl = this.$store.app.rtlClass === 'rtl' ? true : false;
                    this.revenueChart.updateOptions(this.revenueChartOptions);
                });
            },

            // revenue
            get revenueChartOptions() {
                return {
                    series: [{
                            name: 'Income',
                            data: [16800, 16800, 15500, 17800, 15500, 17000, 19000, 16000,
                                15000, 17000, 14000, 17000
                            ],
                        },
                        {
                            name: 'Expenses',
                            data: [16500, 17500, 16200, 17300, 16000, 19500, 16000, 17000,
                                16000, 19000, 18000, 19000
                            ],
                        },
                    ],
                    chart: {
                        height: 325,
                        type: 'area',
                        fontFamily: 'Nunito, sans-serif',
                        zoom: {
                            enabled: false,
                        },
                        toolbar: {
                            show: false,
                        },
                    },
                    dataLabels: {
                        enabled: false,
                    },
                    stroke: {
                        show: true,
                        curve: 'smooth',
                        width: 2,
                        lineCap: 'square',
                    },
                    dropShadow: {
                        enabled: true,
                        opacity: 0.2,
                        blur: 10,
                        left: -7,
                        top: 22,
                    },
                    colors: isDark ? ['#2196f3', '#e7515a'] : ['#1b55e2', '#e7515a'],
                    markers: {
                        discrete: [{
                                seriesIndex: 0,
                                dataPointIndex: 6,
                                fillColor: '#1b55e2',
                                strokeColor: 'transparent',
                                size: 7,
                            },
                            {
                                seriesIndex: 1,
                                dataPointIndex: 5,
                                fillColor: '#e7515a',
                                strokeColor: 'transparent',
                                size: 7,
                            },
                        ],
                    },
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep',
                        'Oct', 'Nov', 'Dec'
                    ],
                    xaxis: {
                        axisBorder: {
                            show: false,
                        },
                        axisTicks: {
                            show: false,
                        },
                        crosshairs: {
                            show: true,
                        },
                        labels: {
                            offsetX: isRtl ? 2 : 0,
                            offsetY: 5,
                            style: {
                                fontSize: '12px',
                                cssClass: 'apexcharts-xaxis-title',
                            },
                        },
                    },
                    yaxis: {
                        tickAmount: 7,
                        labels: {
                            formatter: (value) => {
                                return value / 1000 + 'K';
                            },
                            offsetX: isRtl ? -30 : -10,
                            offsetY: 0,
                            style: {
                                fontSize: '12px',
                                cssClass: 'apexcharts-yaxis-title',
                            },
                        },
                        opposite: isRtl ? true : false,
                    },
                    grid: {
                        borderColor: isDark ? '#191e3a' : '#e0e6ed',
                        strokeDashArray: 5,
                        xaxis: {
                            lines: {
                                show: true,
                            },
                        },
                        yaxis: {
                            lines: {
                                show: false,
                            },
                        },
                        padding: {
                            top: 0,
                            right: 0,
                            bottom: 0,
                            left: 0,
                        },
                    },
                    legend: {
                        position: 'top',
                        horizontalAlign: 'right',
                        fontSize: '16px',
                        markers: {
                            width: 10,
                            height: 10,
                            offsetX: -2,
                        },
                        itemMargin: {
                            horizontal: 10,
                            vertical: 5,
                        },
                    },
                    tooltip: {
                        marker: {
                            show: true,
                        },
                        x: {
                            show: false,
                        },
                    },
                    fill: {
                        type: 'gradient',
                        gradient: {
                            shadeIntensity: 1,
                            inverseColors: !1,
                            opacityFrom: isDark ? 0.19 : 0.28,
                            opacityTo: 0.05,
                            stops: isDark ? [100, 100] : [45, 100],
                        },
                    },
                };
            },

            // sales by category
            get salesByCategoryOptions() {
                return {
                    series: [285, 237, 270, 100, 100],
                    chart: {
                        type: 'donut',
                        height: 460,
                        fontFamily: 'Nunito, sans-serif',
                    },
                    dataLabels: {
                        enabled: false,
                    },
                    stroke: {
                        show: true,
                        width: 25,
                        colors: isDark ? ['#0e1726', '#0e1726', '#0e1726', '#0e1726'] : ['#fff',
                            '#fff', '#fff'
                        ],
                    },
                    colors: isDark ? ['#5c1ac3', '#e2a03f', '#e7515a', '#e2a03f'] : ['#e2a03f',
                        '#5c1ac3', '#e7515a'
                    ],
                    legend: {
                        position: 'bottom',
                        horizontalAlign: 'center',
                        fontSize: '14px',
                        markers: {
                            width: 10,
                            height: 10,
                            offsetX: -2,
                        },
                        height: 50,
                        offsetY: 20,
                    },
                    plotOptions: {
                        pie: {
                            donut: {
                                size: '65%',
                                background: 'transparent',
                                labels: {
                                    show: true,
                                    name: {
                                        show: true,
                                        fontSize: '29px',
                                        offsetY: -10,
                                    },
                                    value: {
                                        show: true,
                                        fontSize: '26px',
                                        color: isDark ? '#bfc9d4' : undefined,
                                        offsetY: 16,
                                        formatter: (val) => {
                                            return val;
                                        },
                                    },
                                    total: {
                                        show: true,
                                        label: 'Total',
                                        color: '#888ea8',
                                        fontSize: '29px',
                                        formatter: (w) => {
                                            return w.globals.seriesTotals.reduce(function(a,
                                                b) {
                                                return a + b;
                                            }, 0);
                                        },
                                    },
                                },
                            },
                        },
                    },
                    labels: ['Apparel', 'Sports', 'Others', 'test', 'tets1'],
                    states: {
                        hover: {
                            filter: {
                                type: 'none',
                                value: 0.15,
                            },
                        },
                        active: {
                            filter: {
                                type: 'none',
                                value: 0.15,
                            },
                        },
                    },
                };
            },

            // daily sales
            get dailySalesOptions() {
                return {
                    series: [{
                            name: 'Sales',
                            data: [44, 55, 41, 67, 22, 43, 21],
                        },
                        {
                            name: 'Last Week',
                            data: [13, 23, 20, 8, 13, 27, 33],
                        },
                    ],
                    chart: {
                        height: 160,
                        type: 'bar',
                        fontFamily: 'Nunito, sans-serif',
                        toolbar: {
                            show: false,
                        },
                        stacked: true,
                        stackType: '100%',
                    },
                    dataLabels: {
                        enabled: false,
                    },
                    stroke: {
                        show: true,
                        width: 1,
                    },
                    colors: ['#e2a03f', '#e0e6ed'],
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            legend: {
                                position: 'bottom',
                                offsetX: -10,
                                offsetY: 0,
                            },
                        },
                    }, ],
                    xaxis: {
                        labels: {
                            show: false,
                        },
                        categories: ['Sun', 'Mon', 'Tue', 'Wed', 'Thur', 'Fri', 'Sat'],
                    },
                    yaxis: {
                        show: false,
                    },
                    fill: {
                        opacity: 1,
                    },
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            columnWidth: '25%',
                        },
                    },
                    legend: {
                        show: false,
                    },
                    grid: {
                        show: false,
                        xaxis: {
                            lines: {
                                show: false,
                            },
                        },
                        padding: {
                            top: 10,
                            right: -20,
                            bottom: -20,
                            left: -20,
                        },
                    },
                };
            },

            // total orders
            get totalOrdersOptions() {
                return {
                    series: [{
                        name: 'Sales',
                        data: [28, 40, 36, 52, 38, 60, 38, 52, 36, 40],
                    }, ],
                    chart: {
                        height: 290,
                        type: 'area',
                        fontFamily: 'Nunito, sans-serif',
                        sparkline: {
                            enabled: true,
                        },
                    },
                    stroke: {
                        curve: 'smooth',
                        width: 2,
                    },
                    colors: isDark ? ['#00ab55'] : ['#00ab55'],
                    labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10'],
                    yaxis: {
                        min: 0,
                        show: false,
                    },
                    grid: {
                        padding: {
                            top: 125,
                            right: 0,
                            bottom: 0,
                            left: 0,
                        },
                    },
                    fill: {
                        opacity: 1,
                        type: 'gradient',
                        gradient: {
                            type: 'vertical',
                            shadeIntensity: 1,
                            inverseColors: !1,
                            opacityFrom: 0.3,
                            opacityTo: 0.05,
                            stops: [100, 100],
                        },
                    },
                    tooltip: {
                        x: {
                            show: false,
                        },
                    },
                };
            },
        }));
    });
    </script>
</body>

</html>


<?php
} else {
  

    header("Location: ../error404.html");



}


?>