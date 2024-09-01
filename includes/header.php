<header>
    <div class="logo"><a href ="">GoBook</a></div>
    <nav>
        <ul>
            <li><a href ="/Web/index">Home</a></li>
            <li><a href ="/Web/contact">Contact Us</a></li>
            <li><a href ="/Web/cart">View My Cart</a></li>
        </ul>
    </nav>
    <div class="search">
        <input type="text" placeholder="Search here">
        <button type="submit">Search</button>
    </div>
    <div class="avatar">
        <img src="avatar.png" alt="avatar" title="avatar" id="avatar">
    </div>
</header>


<div id="loginPopup" class="popup">
    <div class="popup-content">
        <span class="close">×</span>
        <?php 
        if (isset($_SESSION['email'])) 
        {
            include('account.php'); // User is logged in, show account details
        } 
        else 
        {
            include('login.php'); // User is not logged in, show login form
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
