<!-- Core JS Libraries -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

<!-- Custom Scripts -->
<script src="{{ asset('assets-admin/js/custom.js') }}"></script>
<script src="{{ asset('assets-admin/js/dashboard.js') }}"></script>

<!-- CKEditor -->
<script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>

<script src="{{ asset('assets-admin/plugins/jQuery/jquery-1.12.4.min.js') }}"></script>
<script src="{{ asset('assets-admin/plugins/jquery-ui-1.12.1/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets-admin/bootstrap/js/bootstrap.min.js') }}"></script>

<!-- Plugins -->
<script src="{{ asset('assets-admin/plugins/lobipanel/lobipanel.min.js') }}"></script>
<script src="{{ asset('assets-admin/plugins/pace/pace.min.js') }}"></script>
<script src="{{ asset('assets-admin/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('assets-admin/plugins/fastclick/fastclick.min.js') }}"></script>

<!-- Footer Style -->
<style>
    .main-footer {
        background: #ffffff !important;
        border-top: 1px solid #eaeaea !important;
        padding: 20px !important;
        color: #273C66 !important;
        text-align: center;
        margin-left: 250px;
        box-shadow: 0 -2px 10px rgba(39, 60, 102, 0.05);
    }

    .main-footer strong {
        color: #273C66 !important;
        font-weight: 600;
    }

    @media (max-width: 768px) {
        .main-footer {
            margin-left: 0;
            text-align: center;
        }
    }
</style>

<footer class="main-footer">
    <strong>© 2025 KYMS Academy — Excellence in Education</strong>
</footer>