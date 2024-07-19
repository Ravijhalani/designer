
    <div class="container mt-4">
        @if (session('success'))
            <script>
                toastr.success('{{ session('success') }}');
            </script>
        @endif
        @if (session('error'))
            <script>
                toastr.error('{{ session('error') }}');
            </script>
        @endif
        @if (session('info'))
            <script>
                toastr.info('{{ session('info') }}');
            </script>
        @endif
        @if (session('warning'))
            <script>
                toastr.warning('{{ session('warning') }}');
            </script>
        @endif

        <!-- Your other Blade content here -->

    </div>


</body>
</html>
