<header class="header">
    <div class="header-container">
        <div class="logo">
            <a href="/">PetsVEt</a>
        </div>
     <div class="header-actions">
        <nav class="nav">
            <ul class="nav-list">
                <li><a href="/" class="nav-link">Home</a></li>
                <li><a href="/about" class="nav-link {{ request()->is('about') ? 'active' : '' }}">About Us</a></li>
                <li><a href="/blog" class="nav-link">Blogs</a></li>
                <li><a href="/community" class="nav-link">Consultancy</a></li>
                <li><a href="/qna" class="nav-link">Q & A</a></li>
                <li><a href="/products" class="nav-link">Shop</a></li>
            </ul>
         </nav>
        <a href="#" class="btn-login">Log In</a>
     </div>
    </div>
</header>
