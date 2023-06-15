<!-- views/create.php -->

<h1>Create Article</h1>

<form id="create-article-form" action="/article/create" method="POST" onsubmit="submitForm(event)">
    <div id="error-message"></div>

    <div>
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>
    </div>

    <div>
        <label for="content">Content:</label>
        <textarea id="content" name="content" required></textarea>
    </div>

    <div>
        <label for="category_id">Category:</label>
        <select id="category_id" name="category_id">
            <option value="">None</option>
            <?php foreach ($categories as $category): ?>
                <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div>
        <button type="submit">Create</button>
    </div>
</form>
