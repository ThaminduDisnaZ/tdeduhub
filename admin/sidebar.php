        <!-- start sidebar section -->
        <div :class="{'dark text-white-dark' : $store.app.semidark}">
                <nav
                    x-data="sidebar"
                    class="sidebar fixed bottom-0 top-0 z-50 h-full min-h-screen w-[260px] shadow-[5px_0_25px_0_rgba(94,92,154,0.1)] transition-all duration-300"
                >
                    <div class="h-full bg-white dark:bg-[#0e1726]">
                        <div class="flex items-center justify-between px-4 py-3">
                            <a href="index.html" class="main-logo flex shrink-0 items-center">
                                <img class="ml-[5px] w-8 flex-none" src="assets/images/logo.svg" alt="image" />
                                <span class="align-middle text-2xl font-semibold ltr:ml-1.5 rtl:mr-1.5 dark:text-white-light lg:inline">TD EDU HUB</span>
                            </a>
                            <a
                                href="javascript:;"
                                class="collapse-icon flex h-8 w-8 items-center rounded-full transition duration-300 hover:bg-gray-500/10 rtl:rotate-180 dark:text-white-light dark:hover:bg-dark-light/10"
                                @click="$store.app.toggleSidebar()"
                            >
                                <svg class="m-auto h-5 w-5" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M13 19L7 12L13 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path
                                        opacity="0.5"
                                        d="M16.9998 19L10.9998 12L16.9998 5"
                                        stroke="currentColor"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                </svg>
                            </a>
                        </div>
                        <ul
                            class="perfect-scrollbar relative h-[calc(100vh-80px)] space-y-0.5 overflow-y-auto overflow-x-hidden p-4 py-0 font-semibold"
                            x-data="{ activeDropdown: 'dashboard' }"
                        >
                           

                            <h2 class="-mx-4 mb-1 flex items-center bg-white-light/30 px-7 py-3 font-extrabold uppercase dark:bg-dark dark:bg-opacity-[0.08]">
                                <svg
                                    class="hidden h-5 w-4 flex-none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="1.5"
                                    fill="none"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                >
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                                <span>Apps</span>
                            </h2>
                            <?php
                            require "../connection.php";
                            $rprs = Database::search("SELECT * FROM `post` WHERE `post_status_id` = '3' ");
                            $rpnum = $rprs->num_rows;
                            $prs = Database::search("SELECT * FROM `post`  ");
                            $pnum = $prs->num_rows;

                            $crs = Database::search("SELECT * FROM `category`  ");
                            $cnum = $crs->num_rows;

                            ?>

                            <li class="nav-item">
                                <ul>
                                    <li class="nav-item">
                                        <a href="index.php" class="group">
                                            <div class="flex items-center">
                                            <i class="fa fa-home"></i>
                                                <span class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">Dashboard</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="postReqest.php" class="group">
                                            <div class="flex items-center">


                                               <i class="fa fa-inbox"></i>



                                                <span class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">Post Reqest</span> <span class="badge bg-success rounded-full"><?php echo $rpnum ?></span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="post.php" class="group">
                                            <div class="flex items-center">
                                            <i class="fa fa-list"></i>
                                                <span class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">All Posts</span> <span class="badge bg-success rounded-full"><?php echo $pnum ?></span>
                                            </div>
                                        </a>
                                    </li>


                                    <li class="nav-item">
                                        <a href="category.php" class="group">
                                            <div class="flex items-center">
                                            <i class="fa fa-list"></i>
                                                <span class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">Categories</span> <span class="badge bg-success rounded-full"><?php echo $cnum ?></span>
                                            </div>
                                        </a>
                                    </li>
                                    



                                </ul>
                            </li>

                           
                        </ul>
                    </div>
                </nav>
            </div>
            <!-- end sidebar section -->

            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />