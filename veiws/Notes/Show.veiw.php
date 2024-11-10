<?php require base_path('veiws/partials/head.php')?>
<?php require base_path('veiws/partials/nav.php') ?>
<?php require base_path('veiws/partials/banner.php') ?>
  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <p class="mb-6">
        <a href="/index.php/Notes.php" class="text-blue-500 underline">go back...</a>
      </p>
          <p>
          <?=htmlspecialchars($note['body']);  ?>  
          </p>
          <footer class="mt-4">
          <a href="/index.php/Notes/edit.php?id=<?=$note['id']?>" class="rounded-md bg-gray-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Edit</a>
          </footer>
         
       <form  class="mt-6"  method="POST">
        <input type="hidden" name="__method" value="DELETE">
        <input type="hidden" name="id" value="<?=$note['id']?>">
        <button class="text-sm text-red-500">DELETE</button>
       </form>
    </div>
  </main>
  <?php require base_path('veiws/partials/footer.php'); ?>