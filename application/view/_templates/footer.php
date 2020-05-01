    </div>
        <!-- js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/marked/1.0.0/marked.min.js"></script>
    <script src="../../../js/main.js" type="text/javascript"></script>
    <?php
    $url = $this->h($_SERVER['REQUEST_URI']);
    if (
        strpos($url, 'edit') !== false or 
        strpos($url, 'create') !== false or
        strpos($url, 'addUser') !== false
    ) : 
    ?>
    <script src="../../../js/preview.js" type="text/javascript"></script>
    <?php endif; ?>
</body>
</html>
