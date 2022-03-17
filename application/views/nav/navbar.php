<section id="nav-bar">
    <nav class="navbar navbar-light bg-light sticky-top">
        <a class="navbar-brand" href="<?=base_url()?>homepage/dashboard/">Picstorage</a>
        <form action="<?=base_url()?>search/results" method="POST" class="form-inline">
            <input type="text" name="search" class="form-control mr-sm-2" id="nav-searchbar" placeholder="Search every thing..."/>
            <input class="btn btn-outline-success my-2 my-sm-0" type="submit" value="Search">
        </form>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="<?=base_url()?>homepage/logout">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
</section>