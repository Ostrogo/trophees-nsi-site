<?= snippet('header') ?>

<?php
$news = $page->news()->toStructure();

function selectNews($news) {
  foreach ($news as $key => $article) {
    if($article->published() == 'true') return $article;
  };
  return null;
};

?>

<header class="header -decoBottom">

  <!-- Cover -->
  <?php if (null !== $page->cover()->toFile() ): ?>
    <figure class="cover__img -bgImg">
      <?php $image = $page->cover()->toFile() ?>
      <img
          src="<?= $image->url() ?>"
          srcset="<?= $image->srcset([300, 800, 1024]) ?>" />
    </figure>
  <?php endif; ?>

  <?= snippet('ui/menu') ?>

  <div class="header__brand">
    <figure class="header__brand__picto">
      <?= asset('assets/img/nsi-logo-small.svg')->read() ?>
    </figure>
    <p class="header__brand__headline"><?= $site->title()?></p>
  </div>
  <h1 class="header__title primaryTitle"><?= $page->title() ?></h1>

</header>

<section class="content">

  <?php foreach ($page->blocks()->toBlocks() as $key => $block): ?>
      <?= $block ?>
  <?php endforeach; ?>

</section>

<?= snippet('footer') ?>
