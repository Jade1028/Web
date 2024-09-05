*{
    margin: 0px;
    padding: 0px;
    box-sizing: border-box;
    font-family: arial, sans-serif;
    outline: none;
    border: none;
    text-transform: capitalize;
    transition: all .2s linear;
}

header{
    background-color:rgb(255, 235, 205);
    color: rgb(0, 0, 0);
    padding: 20px 60px;
    justify-content: space-between;
    display: flex;
    align-items: center;
    position: sticky;
    top: 0;
    z-index: 100;
}

.logo{
    font-size: 30px;
    font-weight: bold;
}

.logo a{
    color: rgb(0, 0, 0);
    text-decoration: none;
}

.logo a:hover{
    color: rgb(255, 255, 255);
}

nav{
    display: flex;
    align-items:center;
}

nav ul{
    display: flex;
    align-items: center;
    justify-content: center;
}

nav ul li{
    margin-left: 25px;
    list-style: none;
}

nav ul li a{
    color: rgb(0, 0, 0);
    text-decoration: none;
    font-size: 20px;
    font-weight: bold;
    transition: 0.3s ease;
}

nav ul li a:hover{  
    color: rgb(255, 255, 255);
	text-decoration: underline;
}

.search{
    position: relative;
}

.search input{
    padding: 10px;
    border: none;
    border-radius:  20px;
    background-color: rgb(229, 217, 199);
    color:rgb(0, 0, 0);
}

.avatar img{
    vertical-align: middle;
    width: 50px;
    height: 50px;
}

.search i{
    position: absolute;
    top: 0;
    right: 0;
    padding: 13px;
    border: none;
    border-radius: 20px;
}

#pageFooter{
	font-size:0.9em;
	margin: 0px;
	padding: 20px;
	border-top-style: dotted 1px black;
    background-color: rgb(255, 235, 205);
    text-align: center;
}

h1{
    text-align: center;
}

/*content part*/
.slider{
    width: 1300px;
    max-width: 100vw;
    height: 700px;
    margin: auto;
    position: relative;
    overflow: hidden;
}

.list{
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    display: flex;
    width: max-content;
    transition: 1s;
}

.list img{
    width: 1300px;
    max-width:100vw;
    height: 100%;
    object-fit: cover;
}

.buttons{
    position: absolute;
    top: 45%;
    left: 5%;
    width: 90%;
    display: flex;
    justify-content: space-between;
}

.buttons button{
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background-color: rgba(255, 255, 255, 0.555);
    color: black;
    border: none;
    font-family: monospace;
    font-weight: bold;
}

.dots{
    position: absolute;
    bottom: 10px;
    color: white;
    left: 0;
    width: 100%;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
}

.dots li{
    list-style: none;
    width: 10px;
    height: 10px;
    background-color: white;
    margin: 20px;
    border-radius: 20px;
    transition: 1s;
}

.dots li.active{
    width: 40px;
}

@media screen and (max-width: 768px){
    .slider{
        height: 400px;
    }
}

/*product*/
html{
    font-size: 62.5%;
    overflow-x: hidden;
 }

.container{
    max-width: 1200px;
    margin:0px auto;
    padding:3rem 2rem;
}
 
.container .title{
    font-size: 3.5rem;
    color: black;
    margin-bottom: 3rem;
    text-align: center;
    text-decoration: underline overline;
}

.container .same-types{
    padding: 10px;
    margin-bottom: 25px;
}

.container h5{
    font-size: 2.5rem;
    color: black;
    text-align: left;
    text-decoration: underline;
}

 .container .products-container{
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(30rem, 1fr));
    gap:2rem;
    object-fit: cover;
 }
 
 .container .products-container .product{
    text-align: center;
    padding:3rem 2rem;
    background: white;
    box-shadow: 0 .5rem 1rem rgba(0,0,0,.1);
    outline: .1rem solid rgb(204, 204, 204);
    outline-offset: -1.5rem;
    cursor: pointer;
 }
 
 .container .products-container .product:hover{
    outline: .2rem solid #222;
    outline-offset: 0;
 }
 
 .container .products-container .product img{
    height: 25rem;
 }
 
 .container .products-container .product:hover img{
    transform: scale(.9);
 }
 
 .container .products-container .product h3{
    padding:.5rem 0;
    font-size: 2rem;
    color:rgb(68, 68, 68);
 }
 
 .container .products-container .product:hover h3{
    color:rgb(39, 174, 96);
 }
 
 .container .products-container .product .price{
    font-size: 2rem;
    color:rgb(68, 68, 68);
 }
 
 .products-preview{
   position: fixed;
   top:0;
   left:0;
   min-height: 100vh;
   width: 100%;
   background: rgba(0,0,0,.8);
   display: none;
   align-items: center;
   justify-content: center;
}
 
.products-preview .preview{
    display: none;
    padding:2rem;
    text-align: center;
    background: #fff;
    position: relative;
    margin:2rem;
    width: 40rem;
    max-height: 70vh;
    overflow-y: auto;
}
 
.products-preview .preview.active1{
    display: inline-block;
}
 
 .products-preview .preview img{
    height: 30rem;
 }
 
 .products-preview .preview .close{
    position: absolute;
    top:1rem; right:1.5rem;
    cursor: pointer;
    color:#444;
    font-size: 4rem;
 }
 
 .products-preview .preview .close:hover{
    transform: rotate(90deg);
    color: red;
 }
 
 .products-preview .preview h3{
    color: black;
    padding:.5rem 0;
    font-size: 2.5rem;
 }

 .products-preview .preview h6{
    color: grey;
    font-size: 1.5rem;
 }
 
 .products-preview .preview p{
    line-height: 1.5;
    padding:1rem 0;
    font-size: 1.6rem;
    color:#777;
    text-align: justify;
 }
 
 .products-preview .preview .price{
    padding:1rem 0;
    font-size: 2.5rem;
    color:#27ae60;
 }

 .products-preview .preview input[type="number"]{
    width: 25%;
    border-radius: 5px;
    font-size: 20px;
    border: 3px solid black;
    padding: 10px;
 }
 
 .products-preview .preview .cartButton{
    display: flex;
    gap:1.5rem;
    flex-wrap: wrap;
    margin-top: 1rem;
 }
 
 .products-preview .preview .cartButton input[type="submit"]{
    flex: 1 1 16rem;
    padding: 1rem;
    font-size: 1.8rem;
    color: #444;
    border: .1rem solid #444;
    background: #fff;
    text-align: center;
    cursor: pointer;
 }
 
 .products-preview .preview .cartButton input[type="submit"].cart{
    background: #444;
    color:#fff;
 }
 
 .products-preview .preview .cartButton input[type="submit"].cart:hover{
    background: #111;
 }

 @media (max-width:991px){
 
    html{
       font-size: 55%;
    }
 
 }
 
 @media (max-width:768px){
 
    .products-preview .preview img{
       height: 25rem;
    }
 
 }
 
 @media (max-width:450px){
 
    html{
       font-size: 50%;
    } 
 }

.content{
    max-width: 500px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    font-family: Arial, sans-serif;
}

form label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

form input[type="text"],
form input[type="date"],
form input[type="tel"],
form input[type="email"], 
form input[type="password"] {
    width: calc(100% - 20px);
    padding: 8px 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
}

form input[type="radio"] {
    margin-right: 5px;
    margin-left: 10px;
}

form div[id$="Error"] {
    color: red;
    font-size: 12px;
    margin-bottom: 10px;
}

form input[type="button"], 
form input[type="submit"], 
form button[type="submit"] {
    padding: 10px 20px;
    background-color: #28a745;
    color: white;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
}

form input[type="button"]:hover, 
form input[type="submit"]:hover, 
form button[type="submit"]:hover {
    background-color: #218838;
}

/* Popup container */
.popup {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0,0,0,0.5);
}

/* Popup content */
.popup-content {
    position: relative;
    background-color: #fff;
    margin: 10% auto;
    padding: 20px;
    width: 30%;
    border-radius: 5px;
}

/* Close button */
.close {
    position: absolute;
    right: 10px;
    top: 10px;
    font-size: 20px;
    cursor: pointer;
}

input[type="email"] {
    text-transform: lowercase; /* Visual enforcement */
}