<div class="sidebar d-flex flex-column p-3">
    <h4 class="text-white">Admin Panel</h4>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link ">
                <i class="fas fa-tachometer-alt"></i>
                Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('employees.index') }}" class="nav-link">
                <i class="fas fa-users"></i>
                Employees
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('Adminleave-requests.index') }}" class="nav-link">
                <i class="fas fa-envelope-open-text"></i>
                Leave Requests
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('users.create') }}" class="nav-link">
                <i class="fas fa-user"></i>
                Users
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i>
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
</div>