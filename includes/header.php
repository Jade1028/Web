<header>
    <div class="logo"><a href ="/Web/index">GoBook</a></div>
    <nav>
        <ul>
            <li><a href ="/Web/index">Home</a></li>
            <li><a href ="/Web/contact">Contact Us</a></li>
            <li>
            <?php 
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $isLoggedIn = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;?>
            <a href="/Web/cart" <?php if (!$isLoggedIn): ?>class="disabled-link" <?php endif; ?>>View My Cart</a></li>
        </ul>
    </nav>
    <div class="search">
        <input type="text" id="searchInput" placeholder="Search here" onkeyup="search()">
        <i class="fa-solid fa-magnifying-glass"></i>
    </div>
    <div class="avatar">
        <img src="/Web/images/avatar.png" alt="avatar" title="avatar" id="avatar">
    </div>
</header>


<div id="loginPopup" class="popup">
    <div class="popup-content">
        <span class="close">×</span>
        <?php 
        if (isset($_SESSION['email'])) 
        {
            include(__DIR__ . '/../account.php'); // User is logged in, show account details
        } 
        else 
        {
            include(__DIR__ . '/../login.php'); // User is not logged in, show login form
        } 
        ?> 
    </div>
</div>

<script>
    document.getElementById('avatar').onclick = function() 
{
    document.getElementById('loginPopup').style.display = 'block';
};

document.querySelector('.close').onclick = function() 
{
    document.getElementById('loginPopup').style.display = 'none';
};

window.onclick = function(event) 
{
    if (event.target == document.getElementById('loginPopup')) 
    {
        document.getElementById('loginPopup').style.display = 'none';
    }
};
</script>
