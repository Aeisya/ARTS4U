<?php
// Get the 4 most recently added products
$stmt = $pdo->prepare('SELECT * FROM products ORDER BY date_added DESC LIMIT 4');
$stmt->execute();
$recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<?=template_header('Home')?>

<!--<div class="featured">
    <h2>ARTS4U </h2>
    <p>Where Creativity ignites</p>
</div>-->

<div class="container">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>

    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

      <div class="item active">
        <img src="imgs/logo3.jpg" alt="logo3" style="width:100%;">
        <div class="carousel-caption">
          <h3>Arts4U</h3>
          <p>where creativity ignites</p>
        </div>
      </div>

      <div class="item">
        <img src="imgs/header2.jpg" alt="header2" style="width:100%;">
        <div class="carousel-caption">
          <h3> By Aeisya Roslan</h3>
          <p>Arts are meant to be shared</p>
        </div>
      </div>

    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<div class="recentlyadded content-wrapper" id=recentlyaddprod>
    <h2>Latest Products</h2>
    <div class="products">
        <?php foreach ($recently_added_products as $product): ?>
        <a href="index.php?page=product&id=<?=$product['id']?>" class="product">
            <img src="imgs/<?=$product['img']?>" width="200" height="200" alt="<?=$product['name']?>">
            <span class="name"><?=$product['name']?></span>
            <span class="price">
                &dollar;<?=$product['price']?>
                <!--<?php if ($product['rrp'] > 0): ?>
                <span class="rrp">&dollar;<?=$product['rrp']?></span>
              <?php endif; ?>-->
            </span>
        </a>
        <?php endforeach; ?>
    </div>
</div>


<?=template_footer()?>
