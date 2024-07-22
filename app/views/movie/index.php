<?php require_once 'app/views/templates/header.php' ?>
<div class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <?php echo "<h1>Movie Search</h1>" ?>
            </div>
            <?php if ($data['movie']['Response'] != "False") { ?>
                <div class="card mb-5 p-4">
                    <div class="row g-0">
                        <div class="col-md-4">
                        <img src="<? echo $data['movie']['Poster'] ?>" class="img-fluid pb-1" alt="Poster">
                        <p class="card-text mb-1"><strong>Year: </strong><?php echo $data['movie']['Year']; ?></p>
                        <p class="card-text mb-1"><strong>Rated: </strong><?php echo $data['movie']['Rated']; ?></p>
                        <p class="card-text mb-1"><strong>Released: </strong><?php echo $data['movie']['Released']; ?></p>
                        <p class="card-text mb-1"><strong>Runtime: </strong><?php echo $data['movie']['Runtime']; ?></p>
                        <p class="card-text mb-1"><strong>Genre: </strong><?php echo $data['movie']['Genre']; ?></p>
                    </div>
                        <div class="col-md-8">
                            <div class="card-body pt-0">
                            <h2 class="card-title"><?php echo $data['movie']['Title']; ?></h2>
                            <p class="card-text"><strong>Director: </strong><?php echo $data['movie']['Director']; ?></p>
                            <p class="card-text"><strong>Writer: </strong><?php echo $data['movie']['Writer']; ?></p>
                            <p class="card-text"><strong>Actors: </strong><?php echo $data['movie']['Actors']; ?></p>
                            <p class="card-text"><strong>Plot: </strong><?php echo $data['movie']['Plot']; ?></p>
                            <p class="card-text"><strong>Language: </strong><?php echo $data['movie']['Language']; ?></p>
                            <p class="card-text"><strong>Country: </strong><?php echo $data['movie']['Country']; ?></p>
                            <p class="card-text"><strong>Awards: </strong><?php echo $data['movie']['Awards']; ?></p>
                            <p class="card-text"><strong>Metascore: </strong><?php echo $data['movie']['Metascore']; ?>%</p>
                            <p class="card-text"><strong>IMDB Rating: </strong><?php echo $data['movie']['imdbRating']; ?>/10 based on <? echo $data['movie']['imdbVotes']; ?> votes</p>
                            <?php if (isset($_SESSION["auth"])) { ?>
                                <div class="user-rating">
                                    <strong>User Rating: </strong>
                                    <br>
                                    <div class="btn-group">
                                        <?php for ($i = 1; $i <= 5; $i++): ?>
                                            <button type="button" id="star<?php echo $i; ?>" class="btn btn-outline-secondary border border-0 p-3 star-button" data-rating="<?php echo $i; ?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="90" height="90" fill="grey" class="bi bi-star" viewBox="0 0 16 16"><path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z"/></svg>
                                                <span class="visually-hidden">Button</span>
                                            </button>
                                        <?php endfor; ?>
                                    </div>
                                </div>
                            <? } else { ?>
                               <div class="user-rating-disabled">
                                   <strong>User Rating: </strong>
                                   <div class="stars">
                                        <?php for ($i = 1; $i <= 5; $i++): ?>
                                            <i class="bi bi-star"></i>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                              <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z"/>
                                            </svg>
                                        <?php endfor; ?>
                                   </div>
                                   <p class="text-muted">Please <a href="/login">login</a> to give your rating.</p>
                               </div>
                            <? } ?>
                        </div>
                    </div>
                    </div>
                    <div class="row g-0">
                        <h2 class="card-title">Reviews:</h2>
                        <?php if ($data['api_response']): ?>
                            <pre><?= print_r($data['api_response'], true) ?></pre>
                        <?php else: ?>
                            <p>No content generated.</p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php } else {
                echo '<div class="alert alert-danger" role="alert">';
                echo "Movie does not exist.";
                echo '</div>';
            } ?>
                    
        </div>
    </div>

    <?php require_once 'app/views/templates/footer.php' ?>