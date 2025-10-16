<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image" />
            </div>
            <div class="info">
                <a href="#" class="d-block">Admin</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-sidebar flex-column" data-widget="treeview">
                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="/admin_2" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!-- Category -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-list nav-icon"></i>
                        <p>Category<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/add_cat" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/cat_list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Category List</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Order -->
                <li class="nav-item">
                    <a href="/admin_order" class="nav-link">
                    <i class="fa-solid fa-cart-shopping nav-icon"></i>
                        <p>Order</p>
                    </a>
                </li>

                 <!-- Banner -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-images nav-icon"></i>
                        <p>Banner<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/add_home_banner" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Banner</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/home_banner_list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Banner List</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Coupon -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-tag nav-icon"></i>
                        <p>Coupon<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/add_coupon" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Coupon</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/coupon_list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Coupon List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                

                <!-- Brand -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa-solid fa-b nav-icon"></i>
                        <p>Brand<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/add_brand" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Brand</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/brand_list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Brand List</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Color -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                    <i class="fa-solid fa-palette nav-icon"></i>
                        <p>Color<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/add_color" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Color</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/color_list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Color List</p>
                            </a>
                        </li>
                    </ul>
                </li>

                  <!-- Size -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-window-maximize nav-icon"></i>
                        <p>Size<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/add_size" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Size</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/size_list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Size List</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Tax -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa-solid fa-coins nav-icon"></i>
                        <p>Tax<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/add_tax" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Tax</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/tax_list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tax List</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <!-- Product -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                    <i class="fa-brands fa-product-hunt nav-icon"></i>
                        <p>Product<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/add_product" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Product</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/product_list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Product List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/products_attributes" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Products Attributes</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/product_attr_images" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Attributes Images</p>
                            </a>
                        </li>
                    </ul>
                </li>


                  <!-- User -->
                <li class="nav-item">
                    <a href="/customer_list" class="nav-link">
                        <i class="fa-solid fa-user nav-icon"></i>
                        <p>Customer</p>
                    </a>
                </li>



            </ul>
        </nav>
    </div>
</aside>
