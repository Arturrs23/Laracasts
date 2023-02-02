<?php require('partials/head.php') ?>
<?php require('partials/nav.php') ?>
<?php require('partials/banner.php') ?>

<main>
    <ul>
        
    </ul>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <ul>
    <?php foreach ($notes as $note) : ?>
            <li>
                <a href="/note?id=<?= $note['id'] ?>" class="text-blue-500 hover:underline">
                    <?= $note['body'] ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>

    <p>
    <a href="#" class="text-blue-700">Create note</a>

    </p>
    </div>
</main>

<?php require('partials/footer.php') ?>
