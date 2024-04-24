<div class="container bg-dark">
    <div class="d-flex justify-content-evenly align-items-center flex-wrap gap-4">

        <div class="col-4 border border-primary border-2 rounded bg-light">
            <img src="<?php echo $pokemon['image'];?>" class="img-fluid">
            <p><?php echo $pokemon['nameFr']; ?></p>
            <p><?php echo $pokemon['nameJp']; ?></p>
            <p><?php echo $pokemon['generation']; ?></p>
            <p><?php echo $pokemon['category']; ?></p>
            <img src="<?php echo $pokemon['imageShiny'];?>" class="img-fluid">
            <p><?php echo $pokemon['height']; ?></p>
            <p><?php echo $pokemon['weight']; ?></p>
        </div>

    </div>
</div>