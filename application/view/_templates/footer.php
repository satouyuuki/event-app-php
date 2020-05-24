    </div>
        <!-- js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/marked/1.0.0/marked.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dompurify/2.0.11/purify.min.js"></script>
    <script src="../../../js/main.js" type="text/javascript"></script>
    <?php
    if (
        strpos(URI, 'edit') !== false or 
        strpos(URI, 'create') !== false or
        strpos(URI, 'addUser') !== false
    ) : 
    ?>
    <script src="../../../js/preview.js" type="text/javascript"></script>
    <?php elseif (
        strpos(URI, 'detail') !== false or
        strpos(URI, 'Record') !== false
    ) :
    ?>
    <script src="../../../js/markparse.js" type="text/javascript"></script>
    <?php endif; ?>
</body>
</html>
