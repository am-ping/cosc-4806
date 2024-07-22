<?php require_once 'app/views/templates/header.php' ?>
<div class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <?php echo "<h1>Movie Search</h1>" ?>
            </div>
            <?php if ($data['movie']['Response'] != "False") { ?>
                <div class="card mb-5 p-0">
                  <div class="row g-0">
                    <div class="col-md-4 p-3">
                        <img src="<? echo $data['movie']['Poster'] ?>" class="img-fluid" alt="Poster">
                        <p class="card-text"><strong>Year: </strong><?php echo $data['movie']['Year']; ?></p>
                        <p class="card-text"><strong>Rated: </strong><?php echo $data['movie']['Rated']; ?></p>
                        <p class="card-text"><strong>Released: </strong><?php echo $data['movie']['Released']; ?></p>
                        <p class="card-text"><strong>Runtime: </strong><?php echo $data['movie']['Runtime']; ?></p>
                        <p class="card-text"><strong>Genre: </strong><?php echo $data['movie']['Genre']; ?></p>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
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
                        </div>
                    </div>
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