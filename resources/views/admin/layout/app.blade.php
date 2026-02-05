<!doctype html>
<html lang="en">

<head>
    @include('admin.layout.header')
    <style>
        :root {
            --primary-blue: #273C66;
            --primary-dark-blue: #1a2a4a;
            --background-white: #ffffff;
            --background-light: #f5f7fa;
            --text-black: #333333;
            --text-dark: #000000;
            --text-white: #ffffff;
            --border-light: #eaeaea;
            --hover-bg: #273C66;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: var(--background-light) !important;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            color: var(--text-black);
            min-height: 100vh;
        }

        /* Header - White with Black Text */
        .main-header {
            background: var(--background-white) !important;
            border-bottom: 1px solid var(--border-light) !important;
            height: 100px !important;
            box-shadow: 0 2px 10px rgba(39, 60, 102, 0.08);
        }

        .main-header .logo {
            background: transparent !important;
            padding: 10px 15px;
            height: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .main-header .logo img {
            width: 90px !important;
            height: auto;
        }

        .navbar {
            background: transparent !important;
            margin-left: 250px;
            height: 70px;
            border: none !important;
        }

        .sidebar-toggle {
            color: var(--text-black) !important;
            padding: 15px;
            margin-right: 15px;
        }

        .sidebar-toggle:hover {
            color: var(--text-white) !important;
            background: var(--hover-bg);
        }

        .navbar-custom-menu .nav>li>a {
            color: var(--text-black) !important;
            padding: 15px;
        }

        /* Sidebar - White with Black Text, Blue Hover */
        .main-sidebar {
            background: var(--background-white) !important;
            border-right: 1px solid var(--border-light) !important;
            top: 70px;
            left: 0;
            padding-top: 0;
            min-height: calc(100vh - 70px);
            width: 250px;
            z-index: 1029;
            height: 100%;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.05);
        }

        .sidebar {
            padding-top: 20px;
        }

        .sidebar-menu>li>a {
            color: var(--text-black) !important;
            border-left: 3px solid transparent;
            transition: all 0.3s ease;
            padding: 20px 20px !important;
            font-size: 16px;
            font-weight: 600;
            margin-top: 10px;
        }

        .sidebar-menu>li>a i {
            color: var(--text-black) !important;
        }

        .sidebar-menu>li>a:hover {
            background: var(--hover-bg) !important;
            color: var(--text-white) !important;
            border-left-color: var(--primary-blue) !important;
        }

        .sidebar-menu>li>a:hover i {
            color: var(--text-white) !important;
        }

        /* Treeview Menu */
        .treeview-menu {
            background: var(--background-light) !important;
        }

        .treeview-menu>li>a {
            color: var(--text-black) !important;
            padding: 13px 20px 15px 25px !important;
        }

        .treeview-menu>li>a i {
            color: var(--text-black) !important;
        }

        .treeview-menu>li>a:hover {
            color: var(--text-white) !important;
            background: var(--hover-bg) !important;
        }

        .treeview-menu>li>a:hover i {
            color: var(--text-white) !important;
        }

        /* Content Wrapper */
        .content-wrapper {
            background: var(--background-light) !important;
            min-height: calc(100vh - 101px);
            margin-left: 250px;
        }

        /* Cards */
        .card {
            background: var(--background-white) !important;
            border: none !important;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(39, 60, 102, 0.08);
            margin-bottom: 20px;
        }

        .card-header {
            background: var(--background-white) !important;
            color: var(--text-black) !important;
            border-bottom: 2px solid var(--primary-blue) !important;
            border-radius: 8px 8px 0 0 !important;
            padding: 15px 20px !important;
            font-weight: 600;
        }

        .card-body {
            color: var(--text-black) !important;
            padding: 20px !important;
        }

        /* Buttons */
        .btn-primary {
            background: var(--primary-blue) !important;
            border: none !important;
            color: var(--text-white) !important;
            border-radius: 6px;
            padding: 10px 20px;
        }

        .btn-primary:hover {
            background: var(--primary-dark-blue) !important;
        }

        /* Form Controls */
        .form-control {
            background: var(--background-white) !important;
            border: 1px solid var(--border-light) !important;
            color: var(--text-black) !important;
            border-radius: 6px;
        }

        .form-control:focus {
            border-color: var(--primary-blue) !important;
            box-shadow: 0 0 0 2px rgba(39, 60, 102, 0.2);
        }

        /* Tables */
        .table {
            background: var(--background-white) !important;
            color: var(--text-black) !important;
            border-radius: 8px;
            overflow: hidden;
        }

        .table thead th {
            background: var(--background-white) !important;
            color: var(--text-black) !important;
            border-bottom: 2px solid var(--primary-blue) !important;
            padding: 15px !important;
        }

        .table tbody td {
            border-color: var(--border-light) !important;
            padding: 12px 15px !important;
            color: var(--text-black) !important;
        }

        .table tbody tr:hover {
            background: var(--hover-bg) !important;
            color: var(--text-white) !important;
        }

        .table tbody tr:hover td {
            color: var(--text-white) !important;
        }

        /* Dropdown Menu */
        .dropdown-menu {
            background: var(--background-white) !important;
            border: 1px solid var(--border-light) !important;
            color: var(--text-black) !important;
            box-shadow: 0 5px 15px rgba(39, 60, 102, 0.1);
        }

        .dropdown-menu>li>a {
            color: var(--text-black) !important;
            padding: 10px 15px !important;
        }

        .dropdown-menu>li>a:hover {
            background: var(--hover-bg) !important;
            color: var(--text-white) !important;
        }

        /* Search Box */
        #search {
            background: var(--background-white) !important;
        }

        #search input[type="search"] {
            background: var(--background-white) !important;
            border: 1px solid var(--border-light) !important;
            color: var(--text-black) !important;
            border-radius: 6px;
        }

        #search input[type="search"]:focus {
            border-color: var(--primary-blue) !important;
            box-shadow: 0 0 0 2px rgba(39, 60, 102, 0.2);
        }

        #search .btn-add {
            background: var(--primary-blue) !important;
            border: none !important;
            border-radius: 6px;
            color: var(--text-white) !important;
        }

        /* Footer */
        .main-footer {
            background: var(--background-white) !important;
            border-top: 1px solid var(--border-light) !important;
            color: var(--text-black) !important;
            padding: 15px !important;
        }

        .main-footer strong {
            color: var(--text-black) !important;
        }

        /* Badges */
        .badge {
            background: var(--primary-blue) !important;
            color: var(--text-white) !important;
            border-radius: 12px;
            padding: 5px 10px;
            font-size: 12px;
        }

        /* List Items */
        .list-group-item {
            background: var(--background-white) !important;
            border-color: var(--border-light) !important;
            color: var(--text-black) !important;
        }

        .list-group-item:hover {
            background: var(--hover-bg) !important;
            color: var(--text-white) !important;
        }

        /* Breadcrumb */
        .breadcrumb {
            background: var(--background-white) !important;
            border-radius: 6px;
            padding: 10px 15px !important;
            border: 1px solid var(--border-light) !important;
        }

        .breadcrumb a {
            color: var(--text-black) !important;
        }

        .breadcrumb a:hover {
            color: var(--primary-blue) !important;
        }

        /* Alerts */
        .alert {
            background: var(--background-white) !important;
            border: 1px solid var(--border-light) !important;
            color: var(--text-black) !important;
            border-radius: 6px;
        }

        /* Modal */
        .modal-content {
            background: var(--background-white) !important;
            color: var(--text-black) !important;
            border-radius: 8px;
        }

        .modal-header {
            background: var(--background-white) !important;
            color: var(--text-black) !important;
            border-bottom: 2px solid var(--primary-blue) !important;
        }

        /* Remove all dark theme elements */
        .floating-particles {
            display: none;
        }

        body::before {
            display: none;
        }

        .wrapper {
            background: transparent !important;
        }

        /* Global Link Hover */
        a:hover {
            color: var(--primary-blue) !important;
        }

        /* Active states for sidebar */
        .sidebar-menu>li.active>a {
            background: var(--hover-bg) !important;
            color: var(--text-white) !important;
            border-left-color: var(--primary-blue) !important;
        }

        .sidebar-menu>li.active>a i {
            color: var(--text-white) !important;
        }

        /* Icon colors - Black by default */
        .fa,
        .pe-7s {
            color: var(--text-black) !important;
        }

        /* Hover states for icons */
        a:hover .fa,
        a:hover .pe-7s,
        .sidebar-menu>li>a:hover i,
        .treeview-menu>li>a:hover i {
            color: var(--text-white) !important;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .main-sidebar {
                transform: translateX(-100%);
            }

            .content-wrapper,
            .main-footer {
                margin-left: 0;
            }

            .navbar {
                margin-left: 0;
            }
        }

        /* Treeview indicator */
        .pull-right-container .fa-angle-left {
            color: var(--text-black) !important;
        }

        .sidebar-menu>li>a:hover .pull-right-container .fa-angle-left {
            color: var(--text-white) !important;
        }
    </style>

    <link href="{{ asset('assets-admin/plugins/jquery-ui-1.12.1/jquery-ui.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets-admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets-admin/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets-admin/css/pe-icon-7-stroke.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets-admin/css/stylecrm.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets-admin/css/responsive.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>

    <div class="wrapper">

        @yield('content')

        @include('admin.layout.footer')

    </div>

</body>

</html>