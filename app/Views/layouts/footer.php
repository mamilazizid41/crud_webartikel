</main>
    </div>
</div>
<footer class="text-center py-4 bg-light mt-4 border-top">
    <small>&copy; <?= date('Y') ?> My Articles App. All rights reserved.</small>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- jQuery (required), Popper (if not already loaded), Bootstrap, and Summernote JS -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote.min.js"></script>

<script>
  $(document).ready(function () {
    $('#summernote').summernote({
      height: 200
    });
  });
</script>

</body>
</html>