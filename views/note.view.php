<?php require('partials/head.php') ?>
<?php require('partials/nav.php') ?>
<?php require('partials/banner.php') ?>

<main>
    <!-- outputing note on frontend  note.php -->
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <button class="text-blue-500 mb-7">
            <a href="/notes">Go Back To Notes</a>
        </button>
         <p><?= $note['body'] ?></p>
    </div>
</main>

<?php require('partials/footer.php') ?>






