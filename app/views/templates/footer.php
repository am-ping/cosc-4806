</div>

<footer class="footer text-bg-success mx-auto text-center fixed-bottom" style="width: 100%;"">    
    <div class="row">
        <div class="col-lg-12">
            <p class="m-0">Copyright &copy; <?php echo date('Y'); ?> | Arbaaz Mirza </p>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        // change bootstrap icon depending on hover state and if clicked
        const stars = document.querySelectorAll('.star-button');
        const filledStarIcon = "M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z";
        const emptyStarIcon = "M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z";

        let currentHoverIndex = -1;
        let currentRating = 0;

        stars.forEach((star, index) => {
            star.addEventListener('mouseover', () => {
                currentHoverIndex = index;
                updateStars();
            });

            star.addEventListener('mouseout', () => {
                currentHoverIndex = -1;
                updateStars();
            });

            star.addEventListener('click', function() {
                currentRating = index + 1; 
                updateStars();
            });
        });

        function updateStars() {
            stars.forEach((star, index) => {
                const path = star.querySelector('path');
                const svg = star.querySelector('svg');
                if (currentRating > index || (currentHoverIndex >= index && currentHoverIndex >= index)) {
                    path.setAttribute('d', filledStarIcon);
                    svg.setAttribute('fill', "gold");
                } else {
                    path.setAttribute('d', emptyStarIcon);
                    svg.setAttribute('fill', "grey");
                }
            });
        }
        
    });
</script>
</body>
</html>