<div class="sidebar" data-color="azure" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal">
            Another E-Commerce Site
        </a></div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item {{Request::is('dashboard')?'active':''}}">
                <a class="nav-link" href="{{url('dashboard')}}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item {{Request::is('profile')?'active':''}}">
                <a class="nav-link" href="{{url('profile')}}">
                    <i class="material-icons">person</i>
                    <p>Profile</p>
                </a>
            </li>
            <li class="nav-item {{Request::is('categoryList')?'active':''}}">
                <a class="nav-link" href="{{url('categoryList')}}">
                    <i class="material-icons">content_paste</i>
                    <p>Category List</p>
                </a>
            </li>
            <li class="nav-item  {{Request::is('addCategory')?'active':''}}">
                <a class="nav-link" href="{{url('addCategory')}}">
                    <i class="material-icons">add_circle</i>
                    <p>Add Category</p>
                </a>
            </li>
            </li>
            <li class="nav-item {{Request::is('productList')?'active':''}}">
            <a class="nav-link" href="{{url('productList')}}">
                <i class="material-icons">content_paste</i>
                <p>Product List</p>
            </a>
            </li>
            <li class="nav-item  {{Request::is('addProduct')?'active':''}}">
            <a class="nav-link" href="{{url('addProduct')}}">
                <i class="material-icons">add_circle</i>
                <p>Add Product</p>
            </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('homepage')}}">
                    <i class="material-icons">home</i>
                    <p>Home</p>
                </a>
            </li>
{{--            <li class="nav-item ">--}}
{{--                <a class="nav-link" href="./icons.html">--}}
{{--                    <i class="material-icons">bubble_chart</i>--}}
{{--                    <p>Icons</p>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li class="nav-item ">--}}
{{--                <a class="nav-link" href="./map.html">--}}
{{--                    <i class="material-icons">location_ons</i>--}}
{{--                    <p>Maps</p>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li class="nav-item ">--}}
{{--                <a class="nav-link" href="./notifications.html">--}}
{{--                    <i class="material-icons">notifications</i>--}}
{{--                    <p>Notifications</p>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li class="nav-item ">--}}
{{--                <a class="nav-link" href="./rtl.html">--}}
{{--                    <i class="material-icons">language</i>--}}
{{--                    <p>RTL Support</p>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li class="nav-item active-pro ">--}}
{{--                <a class="nav-link" href="./upgrade.html">--}}
{{--                    <i class="material-icons">unarchive</i>--}}
{{--                    <p>Upgrade to PRO</p>--}}
{{--                </a>--}}
{{--            </li>--}}
        </ul>
    </div>
</div>
