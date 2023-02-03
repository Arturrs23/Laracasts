<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <!-- Link to go back to the notes page -->
        <p class="mb-6">
            <a href="/notes" class="text-blue-500 underline">go back...</a>
        </p>

        <!-- Display the body of the note -->
        <p><?= htmlspecialchars($note['body']) ?></p>

        <!-- Form to delete the note -->
        <form class="mt-6" method="POST">
            <!-- Add method override for DELETE -->
            <input type="hidden" name="_method" value="DELETE">
            <!-- Include the note id in the form -->
            <input type="hidden" name="id" value="<?= $note['id'] ?>">
            <!-- Submit button to delete the note -->
            <button class="text-sm text-red-500">Delete</button>
        </form>
    </div>

</main>

<?php require base_path('views/partials/footer.php') ?>