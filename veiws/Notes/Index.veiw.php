<?php require base_path('veiws/partials/head.php')?>
<?php require base_path('veiws/partials/nav.php') ?>
<?php require base_path('veiws/partials/banner.php') ?>
  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
<ul>
<?php foreach ($Notes as $note) : ?>
           <li>
            <a href="/index.php/Notes?id=<?= $note['id']?>" class="text-blue-500 hover:underline">
            <?= htmlspecialchars($note['body']); ?>  
            </a>
        </li>
    <?php endforeach; ?>
</ul>

     <p class="mb-6">
      <a href="/index.php/Notes/Create.php" class="text-blue-500 hover:underline">Create Note</a>
     </p>
    </div>
  </main>
<?php require base_path('veiws/partials/footer.php'); ?>