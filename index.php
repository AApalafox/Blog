<?php $carouselItems = [["img/orange.jpg","Discover the Places","Visit various places from all over the world"],["img/brown.jpg","Experience the Life","Make memories throughout the times"],["img/black.jpg","Explore the Beauty","The most beautiful things are often in dangerous places"]] ?>
<?php $cardItems = [["img/green.jpg","Forrest",[5,0,1],"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem."],["img/gray.jpg","Fields",[1,3,4],"Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"],["img/blue.jpg","Jungle",[2,4,6],"Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"]] ?>
<?php $tags = ["adventure","planned","surprise","team","series","hot","danger"] ?>
<?php $btnclassNames = ["btn-outline-success","btn-outline-secondary","btn-outline-warning","btn-outline-info","btn-outline-primary","btn-outline-danger","btn-outline-dark"] ?>
<?php $bclassNames = ["bg-success","bg-secondary","bg-warning","bg-info","bg-primary","bg-danger","bg-dark"] ?>
<?php $popularPosts = [["img/city.jpg", "Night in a City",[5,1,3]],["img/jungle.jpg","Alone in the Dark",[5,6,0]],["img/cliff.jpg","A Breathtaking View on Top",[5,2,3]]] ?>

<!DOCTYPE html>
<html>

<?php include 'templates/header.php'; ?>

<div class="carousel-container shadow">
  <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner shadow">
      <div class="carousel-item active">
        <img src="<?php echo $carouselItems[0][0]; ?>" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h2><?php echo $carouselItems[0][1]; ?></h2>
          <p><?php echo $carouselItems[0][2]; ?></p>
        </div>
      </div>
      <div class="carousel-item shadow">
        <img src="<?php echo $carouselItems[1][0]; ?>" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h2><?php echo $carouselItems[1][1]; ?></h2>
          <p><?php echo $carouselItems[1][2]; ?></p>
        </div>
      </div>
      <div class="carousel-item shadow">
        <img src="<?php echo $carouselItems[2][0]; ?>" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h2><?php echo $carouselItems[2][1]; ?></h2>
          <p><?php echo $carouselItems[2][2]; ?></p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev opacity-25" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next opacity-25" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>

<div class="row align-items-start justify-content-between my-5">
  <div class="col-md-8">
    <?php foreach ($cardItems as $cardItem) { ?>
      <div class="card justify-content-center pb-2 mb-5 mycard shadow-sm" style="width: 100%;">
        <div class="img-container">
          <img class="card-img-top" src="<?php echo $cardItem[0] ?>" alt="Card image cap">
          <ul class="thumb-info pt-3 pb-4">
            <li><i class="fas fa-user-edit"></i>Admin</li>
            <li><i class="fas fa-calendar-alt"></i>October 27,2021</li>
            <li><i class="fas fa-comment-dots"></i>5 Comments</li>
          </ul>
        </div>
        <div class="card-body">
          <a href="#" class="mylink"><h2 class="card-title"><?php echo $cardItem[1] ?></h2></a>
          <?php foreach ($cardItem[2] as $badge) { ?>
            <span class="badge rounded-pill <?php echo $bclassNames[$badge] ?>"><?php echo $tags[$badge] ?></span>
          <?php } ?>
          <p class="card-text"><?php echo $cardItem[3] ?></p>
          <a href="#" class="mybutton">Read more</a>
        </div>
      </div>
    <?php } ?>

    <nav aria-label="Page navigation example bg-dark">
      <ul class="pagination justify-content-center">
        <li class="page-item disabled">
          <a class="page-link" href="#" tabindex="-1">Previous</a>
        </li>
        <li class="page-item active"><a class="page-link bg-dark" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
          <a class="page-link" href="#">Next</a>
        </li>
      </ul>
    </nav>
  </div>

  <div class="col-md-4">
    <div>
      <a href="#" class="mylink"><h5 class="mini-title">Categories</h5></a>
      <?php $categories = [["Jungle",10],["Cities",6],["Forrest",4],["Plains",3]] ?>
      <ul class="list-group list-group-flush">
        <?php foreach ($categories as $category) { ?>
          <a href="#"><li class="list-group-item d-flex justify-content-between align-items-center shadow-sm mb-1">
            <?php echo $category[0]; ?>
            <span class="badge bg-dark rounded-pill"><?php echo $category[1]; ?></span></li>
          </a>
        <?php } ?>
      </ul>
    </div>
    <br>

    <a href="#" class="mylink"><h5 class="mini-title">Popular Posts</h5></a>
    <?php foreach ($popularPosts as $post) { ?>
      <div class="card justify-content-center popular-card mb-4" style="width: 100%;">
        <a href="#" class="mylink">
          <div class="img-container">
            <img class="card-img-top" src="<?php echo $post[0] ?>" alt="Card image cap">
          </div>
          <div class="card-body">
            <h6 class="card-title"><?php echo $post[1] ?></h6>
            <?php foreach ($post[2] as $badge) { ?>
              <span class="badge rounded-pill <?php echo $bclassNames[$badge] ?>"><?php echo $tags[$badge] ?></span>
            <?php } ?>
          </a>
        </div>
      </div>
    <?php } ?>

    <a href="#" class="mylink"><h5 class="mini-title">Tags</h5></a>
    <div>

      <?php foreach ($tags as $index => $tag) { ?>
        <?php $btnclassName = $btnclassNames[$index] ?>
        <button type="button" class="btn <?php echo $btnclassName; ?>"><?php echo $tag; ?></button>
      <?php } ?>
    </div>
  </div>
</div>
</div> <!--extra dive for container from header-->

<?php include 'templates/footer.php'; ?>

</html>