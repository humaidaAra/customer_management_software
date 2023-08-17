<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-heading">Pages</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="/">
                <i class="bi bi-house"></i>
                <span>Home</span>
            </a>
        </li><!-- End Profile Page Nav -->


        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('customers.index') }}">
                <i class="bi bi-person"></i>
                <span>Customers</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('contracts.index') }}">
                <i class="bi bi-file-text"></i>
                <span>Contracts</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('invoices.index') }}">
                <i class="bi bi-currency-dollar"></i>
                <span>Invoices</span>
            </a>
        </li>
        
    </ul>

</aside><!-- End Sidebar-->
