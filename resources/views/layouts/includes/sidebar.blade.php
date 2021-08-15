<nav class="active" id="sidebar">
    <ul class="list-unstyled lead">
        <li class="active">
            <a href="#"><i class="fa fa-home"></i>Home</a>
        </li>
        <li>
            <a href="#"><i class="fa fa-university" ></i>Products</a>
        </li>
        <li>
            <a href="#"><i class="fa fa-location-arrow" aria-hidden="true"></i>Orders</a>
        </li>
        <li>
            <a href="#"><i class="fa fa-folder-open" aria-hidden="true"></i>Categories</a>
        </li>
        <li>
            <a href="#"><i class="fa fa-folder-open" aria-hidden="true"></i>SubCategories</a>
        </li>
    </ul>
</nav>

<style>
    #sidebar ul.lead{
        border-bottom: 1px solid #47748b;
        width: fit-content;
    }
    #sidebar ul li a{
        padding: 10px;
        font-size: 1.1em;
        display: block;
        width: 30vh;
        color: #008B8B;
    }
    #sidebar ul li a:hover{
        color: #fff;
        background-color: #008B8B;
        text-decoration: none;
    }
    #sidebar ul li a i{
        margin-right: 10px;
    }
    #sidebar ul li.active>a,a[aria-expanded="true"]{
        color: #fff;
        background-color: #008B8B;
    }
</style>