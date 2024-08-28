<header>
    <div class="logo"><a href ="">GoBook</a></div>
    <nav>
        <ul>
            <li><a href ="/Web/index">Home</a></li>
            <li><a href ="">Contact Us</a></li>
            <li><a href ="">View My Cart</a></li>
        </ul>
    </nav>
    <div class="search">
    <input type="text" placeholder="Search here">
    <button type="submit">Search</button>
    </div>
    <div class="avatar">
    <img src="avatar.png" alt="avatar" title="avatar">
    </div>
</header>


<div id="loginPopup" class="popup">
    <div class="popup-content">
        <span class="close">&times;</span>
        <?php include('login.php'); ?> 
    </div>
</div>

<script>
    document.getElementById('avatar').onclick = function() 
{
    document.getElementById('loginPopup').style.display = 'block';
    console.log("avatar clicked");
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