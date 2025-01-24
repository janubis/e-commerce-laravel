<ul class="account-nav">
    <li><a href="{{ route('user.index') }}" class="menu-link menu-link_us-s">Хэрэглэгчийн удирдлага</a></li>
    <li><a href="{{ route('user.account.orders')}}" class="menu-link menu-link_us-s {{Route::is('user.account.orders') ? 'menu-link_active':''}}">Миний захиалгууд</a></li>
    <li><a href="{{ route('user.account.address') }}" class="menu-link menu-link_us-s {{Route::is('user.account.address') ? 'menu-link_active':''}}">Хүргэлтийн хаяг</a></li>
    <li><a href="{{ route('user.account.profile') }}" class="menu-link menu-link_us-s {{Route::is('user.account.profile') ? 'menu-link_active':''}}">Хувийн мэдээлэл</a></li>
    <li><a href="{{ route('wishlist.index')}}" class="menu-link menu-link_us-s">Таалагдсан бараа</a></li>
    <li>
        <form method="POST" action="{{ route('logout') }}" id="logout-form">
            @csrf
            <a href="{{ route('logout') }}" class="menu-link menu-link_us-s" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Гарах</a>
        </form>
    </li>
</ul>