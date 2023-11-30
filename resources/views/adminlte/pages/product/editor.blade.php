
<script src="ckeditor/ckeditor.js"></script>
<form method="POST">
    <textarea id="editor" name="editor"></textarea>
    <input type="submit" name="submit">
</form>
<script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
        
</script>