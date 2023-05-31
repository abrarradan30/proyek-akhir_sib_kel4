@include('admin.layout.top')
@include('admin.layout.menu')

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                            @include('sweetalert::alert')
                        @yield('content')
                        <!-- yield adalah deklarasi yang akan diisi konten ketika yieldnya dipanggil
                        didalam konten masing-masing, contoh yield yang diatas menggunakan value content -->
                    </div>
                </main>
</div>

@include('admin.layout.bottom')