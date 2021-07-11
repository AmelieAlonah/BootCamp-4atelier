
      </main>
<aside class="col-lg-3">
  <div class="input-group mb-3">
    <input type="text" class="form-control" placeholder="Rechercher un article..."
      aria-label="Rechercher un article..." aria-describedby="basic-addon2">
    <div class="input-group-append">
      <button class="btn btn-outline-secondary" type="button">Allez</button>
    </div>
  </div>

  <div class="card">

    <h3 class="card-header">Catégories</h3>

    <ul class="list-group list-group-flush">
    <?php foreach($categoryList as $currentId => $currentCategory) :?>
      <li class="list-group-item"> <a href="index.php?page=category&id=<?=$currentId?>"> <?=$currentCategory->getName()?></a></li>
    <?php endforeach; ?>

    </ul>

  </div>

  <div class="card">
    <h3 class="card-header">Auteurs</h3>
    <ul class="list-group list-group-flush">

    <?php foreach($authorList as $currentId => $currentAuthor) :?>
      <li class="list-group-item">
        <a href="index.php?page=author&id=<?=$currentId?>">
         <?=$currentAuthor->getName()?>
        </a>
      </li>
    <?php endforeach; ?>

    </ul>
  </div>

</aside>
</div>


<footer>

<div class="row justify-content-center text-center">
  <div class="col-6 social-networks">
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#"><i class="fa fa-twitter-square"></i></a></li>
      <li class="list-inline-item"><a href="#"><i class="fa fa-facebook-square"></i></a></li>
      <li class="list-inline-item"><a href="#"><i class="fa fa-github-square"></i></a></li>
    </ul>
  </div>
</div>

<div class="row justify-content-center text-center">
  <div class="col-9 links">
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Nous contacter</a></li>
      <li class="list-inline-item"><a href="#">Qui sommes nous ?</a></li>
      <li class="list-inline-item"><a href="#">Mentions légales</a></li>
    </ul>
  </div>
</div>

</footer>

</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous">
</script>
</body>

</html>
