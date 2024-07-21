<?php require_once 'app/views/templates/header.php' ?>
<div class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <?php echo "<h1>Movie Search</h1>" ?>
            </div>
            <form action="/movie/search" method="post" role="search">
                <div class="form-group d-flex">
                    <input required type="text" class="form-control rounded-start rounded-0" type="search" name="search" aria-label="Search" placeholder="Enter Movie Name...">
                    <button type="submit" class="btn btn-info me-2 rounded-end rounded-0">Search</button>
                </div>
                <br>
            </form>
            <br>
            
        </div>
    </div>

    <?php require_once 'app/views/templates/footer.php' ?>