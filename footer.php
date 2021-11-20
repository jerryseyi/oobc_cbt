
</div>
</div>

<script>
    function toggleMenu() {
        let toggle = document.querySelector('.toggle');
        let navigation = document.querySelector('.navigation');
        let main = document.querySelector('.main');
        toggle.classList.toggle('active');
        navigation.classList.toggle('active');
        main.classList.toggle('active');
    }

    function toggleDropdown() {
        let dropdown = document.querySelector('.dropdown');
        dropdown.classList.toggle('active');
    }

    var url;
    function confirmation(url){
        var answer= confirm('Are you sure you\'re ready for this Exam?\n\n Click "OK" to Proceed to Exam or Click "CANCEL" otherwise');
        if(answer){
            window.location= url;
        }else{
            return false;
        }
    }

</script>

<?php if (isset($dStart) && isset($dEnd)): ?>
    <script>
        let start = <?= json_encode($dStart, JSON_HEX_TAG) ?>;
        let end = <?= json_encode($dEnd, JSON_HEX_TAG) ?>;

        (function () {
            document.getElementById("start").value = start;
            document.getElementById("dateClose").value = end;
        }());
    </script>
<?php endif; ?>

<?php if (isset($filepond)): ?>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
    <script>
        FilePond.registerPlugin(FilePondPluginImagePreview);
        FilePond.parse(document.body);
    </script>
<?php endif;?>
</body>
</html>