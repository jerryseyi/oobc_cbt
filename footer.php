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
</body>
</html>