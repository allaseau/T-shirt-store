<!DOCTYPE html>
<html lang="fr">
<?php $title="Création article"; $site_description="Venez créer votre propre article qui concerne le BIO"; require "../head.php"; ?>
<body>
    <style>
        .ql-container.ql-snow.-error {
            border: solid red;
        }
    </style>
    <?php require "../header.php"; ?>

    <div class="container">
        <h1>Création article</h1>

        <form
            action=""
            method="POST"
            enctype="multipart/form-data"
            >
            
            <div class="form-group">
                <label>
                    Title
                    <input
                        class="form-control"
                        type="text"
                        name="title"
                        placeholder="Title"
                        maxlength="50"
                        value="<?= isset($article) ? $_POST['title'] : '' ?>" />
                </label>
                <?php if (isset($validations) && isset($validations['title'])): ?>
                    <p><?= $validations['title'] ?></p>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label>
                    Content
                    <!-- <textarea
                        class="form-control"
                        name="content"
                        maxlength="1000"><?= isset($article) ? $_POST['content'] : '' ?></textarea> -->
                    <div id="editor"></div>
                    <input type="hidden" name="content" />
                </label>
                <?php if (isset($validations) && isset($validations['content'])): ?>
                    <p><?= $validations['content'] ?></p>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label>
                    Image
                    <input
                        class="form-control"
                        type="file"
                        name="image"
                        accept="image/*" />
                </label>
            </div>

            <input type="submit" value="Save" class="btn btn-primary" />

        </form>
    </div>

    <?php require "../footer.php"; ?>
    <script>
        var quill = new Quill('#editor', {
            theme: 'snow',
            placeholder: 'Ton super article ici !',
            modules: {
                toolbar: [
                    [{ 'header': [2,3,4,false] }],
                    ['bold', 'italic'],
                    ['video'],
                    ['clean']
                ]
            }
        });
        var form = document.querySelector('form');
        form.onsubmit = function(e) {
            var contentInput = document.querySelector('input[name=content]');
            var contentToSave = quill.getContents();
            if (contentToSave.ops.length === 1 && Object.keys(contentToSave.ops[0]).length === 1 && contentToSave.ops[0].insert.trim().length === 0) {
                document.querySelector('#editor').className = 'ql-container ql-snow -error';
                return false;
            } else {
                contentInput.value = JSON.stringify(contentToSave);
                document.querySelector('#editor').className = 'ql-container ql-snow';
                return true;
            }
        };
    </script>
</body>
</html>
